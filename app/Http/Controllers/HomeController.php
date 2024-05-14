<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $mes_atual = Carbon::now()->month;

        $dia_atual = Carbon::now()->day;

        $contagem_registros_mes_atual = DB::table('confirmacao')
            ->whereMonth('dia', $mes_atual)
            ->count();

        $id_colab = auth()->user()->id;

        $adm = DB::SELECT("SELECT * FROM users WHERE ID = $id_colab");

         $perm = 0;

        if($adm[0]->ADM == 'S'){
            $perm = 1;
        }else{
            $perm = 2;
        }

        
        $saldo = DB::SELECT("SELECT Saldo FROM users WHERE ID = $id_colab");


        $saldo = $saldo[0]->Saldo;

        return view('home2', compact('contagem_registros_mes_atual', 'dia_atual', 'perm', 'saldo'));

    }

    public function verifica_inscricao(Request $request)
    {

        $id_colab = auth()->user()->id;
        $colab = auth()->user()->name;
        $dia = $request->dia;

        $verifica = DB::SELECT("select * from confirmacao where id_colab = $id_colab and dia = '$dia' ");

        // SE RETORNAR 1 É PORQUE A PESSOA JÁ ESTÁ INSCRITA NAQUELE DIA
        // SE RETORNAR 2 É PORQUE NÃO ESTÁ INSCRITA

        if ($verifica) {
            return 1;
        } else {
            return 2;
        }
    }

    public function cancela_inscricao(Request $request)
    {

        $id_colab = auth()->user()->id;
        $colab = auth()->user()->name;
        $dia = $request->data_confirma;

        $saldo = DB::SELECT("SELECT Saldo From users where id = $id_colab");

        $saldo_atual = $saldo[0]->Saldo + 1;
        DB::UPDATE("update users set saldo = $saldo_atual where id = $id_colab");
        DB::DELETE("DELETE FROM confirmacao WHERE dia = '$dia' and id_colab = $id_colab");
    }

    public function confirma(Request $request)
    {

        $id_colab = auth()->user()->id;
        $colab = auth()->user()->name;
        $dia = $request->data_confirma;
        $saldo_atual = 0;
        
        $saldo = DB::SELECT("SELECT Saldo From users where id = $id_colab");


        if($saldo[0]->Saldo == NULL){
            DB::UPDATE("update users set saldo = 0 where id = $id_colab");
        }

        if($saldo[0]->Saldo <= 0){
            $saldo_atual = $saldo[0]->Saldo - 1;
            DB::UPDATE("update users set saldo = $saldo_atual where id = $id_colab");
            DB::INSERT("INSERT INTO confirmacao (colaborador,id_colab,dia,situacao) values ('$colab','$id_colab','$dia','PEND')");
        }else{
            $saldo_atual = $saldo[0]->Saldo - 1;
            DB::UPDATE("update users set saldo = $saldo_atual where id = $id_colab");
            DB::INSERT("INSERT INTO confirmacao (colaborador,id_colab,dia,situacao) values ('$colab','$id_colab','$dia','OK')");
        }

    }

    public function busca_colaboradores()
    {
        // Obtenha a data atual

        $data_atual = Carbon::now()->timezone('America/Sao_Paulo');

        // Use a cláusula WHERE para filtrar os registros com o dia atual
        $confirmacoes = DB::table('confirmacao')->whereDate('dia', $data_atual)->get();

        return $confirmacoes;
    }
    public function adm(Request $request)
    {
        $mes_atual = Carbon::now()->month;

        $dia_atual = Carbon::now()->day;

        $contagem_registros_mes_atual = DB::table('confirmacao')
            ->whereMonth('dia', $mes_atual)
            ->count();

            
        return view('adm', compact('contagem_registros_mes_atual', 'dia_atual'));
    }

    public function contaCredito(Request $request){



            $date = Carbon::create($request->year, $request->mes, null, null);

            $ultimo_dia_do_mes = Carbon::parse($date)->lastOfMonth()->format('Y-m-d');

            $primero_dia_do_mes = Carbon::parse($date)->firstOfMonth()->format('Y-m-d');

            $info = DB::SELECT("SELECT users.id ,users.name, count(*) AS Registros FROM confirmacao
                            inner join users on users.id = confirmacao.id_colab
                            AND dia BETWEEN '$primero_dia_do_mes' AND '$ultimo_dia_do_mes'
                            group by name, id");
        
        return $info;

    }

    public function detalhes_credito(Request $request){

        $date = Carbon::create($request->year, $request->mes, null, null);

        $ultimo_dia_do_mes = Carbon::parse($date)->lastOfMonth()->format('Y-m-d');

        $primero_dia_do_mes = Carbon::parse($date)->firstOfMonth()->format('Y-m-d');

        $info = DB::SELECT("SELECT confirmacao.id,dia,situacao FROM confirmacao
        inner join users on users.id = confirmacao.id_colab
        WHERE users.id = $request->id
        AND dia BETWEEN '$primero_dia_do_mes' AND '$ultimo_dia_do_mes'");

        foreach ($info as $key => $reg) {
            $reg->dia = date("d/m/Y", strtotime($reg->dia));
        }
    
        return $info;
       

    }

    public function registraPag(Request $request){

        DB::update("update confirmacao set situacao = 'OK' where id = $request->id");

    }

    public function usuarios(){
        
        $info = DB::SELECT("SELECT id,name,email,ADM,saldo FROM users");
        return $info;
    }

    public function PermissaoAdm(Request $request){

        if($request->tipo == 1){
            try {
                DB::update("update users set adm = 'S' where id = $request->id");
                return 1;
            } catch (\Throwable $th) {
                return 2;
            }
        }else if($request->tipo = 2 ){
            try {
                DB::update("update users set adm = '' where id = $request->id");
                return 1;
            } catch (\Throwable $th) {
                return 2;
            }
        }
        
       
    }
    public function AdicionaCreditosColab(Request $request) {
     
        $credito = DB::SELECT("SELECT saldo FROM users Where id = $request->id");
    
        if ($credito) {
            // Verifica se o saldo do usuário é suficiente para cobrir os registros de pagamento pendentes
            $registros_pendentes = DB::SELECT("SELECT COUNT(*) AS qtd_registros_pendentes FROM confirmacao WHERE situacao = 'PEND' AND id_colab = $request->id");

            $saldo_disponivel = $credito[0]->saldo + $request->numeroCreditos;
            $registros_pagos = 0;
            foreach ($registros_pendentes as $registro) {
                if($registros_pagos <= $request->numeroCreditos ){
                    DB::UPDATE("UPDATE confirmacao SET situacao = 'OK' WHERE situacao = 'PEND' AND id_colab = $request->id LIMIT 1");
                    $saldo_disponivel--;
                    $registros_pagos++;
                }
            }
    
            // Atualiza o saldo do usuário
            DB::UPDATE("UPDATE users SET saldo = $saldo_disponivel + 1 WHERE id = $request->id");
    
            return 1;
        } else {
            return 2;
        }
    }

    public function VerificaSaldo(Request $request){

        $id_colab = auth()->user()->id;
        $saldo = DB::SELECT("SELECT Saldo FROM users WHERE ID = $id_colab");

        return $saldo[0]->Saldo;
    }

    
    public function HistoricoReg(Request $request){

        $date = Carbon::create($request->year, $request->mes, null, null);

        $ultimo_dia_do_mes = Carbon::parse($date)->lastOfMonth()->format('Y-m-d');

        $primero_dia_do_mes = Carbon::parse($date)->firstOfMonth()->format('Y-m-d');

        $id_colab = auth()->user()->id;

        $info = DB::SELECT("SELECT confirmacao.id,dia,situacao FROM confirmacao
        inner join users on users.id = confirmacao.id_colab
        WHERE users.id = $id_colab
        AND dia BETWEEN '$primero_dia_do_mes' AND '$ultimo_dia_do_mes'");

        foreach ($info as $key => $reg) {
            $reg->dia = date("d/m/Y", strtotime($reg->dia));
        }
    
        return $info;
       

    }
}
