@extends('layouts.app')

@section('content')
<div class="container">
    @guest

    @else
        @if (Auth::user()->Admin == 1)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Questões</div>
                    <div class="panel-body">
                         <form class="form-horizontal" method="POST">
                        {{ csrf_field() }}
                            <div class="form-group">
                            		<label for="pergunta" class="col-md-4 control-label">ID Questionario</label>
                            	<div class="col-md-6">
	                            	<input value="{{$questoes['id']}}" class="form-control" name="idQuestao" readonly><br>
                            	</div>
                                <label for="pergunta" class="col-md-4 control-label">Pergunta</label>
                                <div class="col-md-6">
                                    <input id="pergunta" type="text" class="form-control" name="pergunta" value="{{ $questoes['tituloPergunta'] }}" required autofocus>
                                </div>
                            </div>
    
                            <div class=" form-group">
                                <label class="col-md-4 control-label">Alternativas</label>
                                <div class="col-md-6 field_wrapper">
                                	@foreach ($respostas as $resp) 
                                	<div>
                                    	<input type="text" name="field_name[]" class="form-control" value="{{$resp['respostas']}}"/>
                                    	<a href="javascript:void(0);" class="remove_button">Remover Alterantiva</a>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-6">
                                	<a href="javascript:void(0);" class="add_button" title="Adicionar mais uma alternativa">Adicionar mais uma alternativa</a>
                            	</div>
                            </div>                       
    
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Atualizar
                                    </button>
                                </div>
                            </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    @endif
    @endguest
</div>
<script src="{{ asset('js/cadastrarQuestoes.js') }}"></script>

@endsection
