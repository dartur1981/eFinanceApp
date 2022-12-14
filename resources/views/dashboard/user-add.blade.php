@extends('dashboard.template')

@section('title', 'Home')

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Cadastrar Usuário</h1>
    <p>Start a beautiful journey here</p>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <!-- <div class="tile-body">Create a beautiful dashboard</div> -->
      <h3 class="tile-title">Cadastrar Usuário</h3>
      <div class="tile-body">
        <form id="frmCadastro" name="frmCadastro" method="post" action="{{ route('storeUser') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $user->su_id ?? '' }}" /> 
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                <label class="col-form-label" for="inputDefault">Usuário</label>
                    <input class="form-control" id="inputDefault" name="user" value="{{ $user->su_user ?? '' }}" type="text" required>
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="inputDefault">Senha</label>
                  <input class="form-control" id="inputDefault" name="password" value="" type="password" required>
                </div>
                <div class="form-group">
                  <label for="exampleSelect1">Perfil de Acesso</label>
                  <select class="form-control" id="exampleSelect1" name="group" value="{{ $user->su_group ?? '' }}" required>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="toggle lg">
                  <label>
                    <label for="group">Status</label>
                    <input type="checkbox" id="status" value=""><span class="button-indecator"></span>
                  </label>
                </div>
              </div>
              <div class="col-lg-5">
                <div class="form-group">
                  <label class="col-form-label" for="inputDefault">Nome do Usuário</label>
                  <input class="form-control" id="inputDefault" name="name" value="{{ $user->su_name ?? '' }}" type="text" required>
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="inputDefault">Conta de E-mail</label>
                  <input class="form-control" id="inputDefault" name="email" value="{{ $user->su_email ?? '' }}" type="email" required>
                </div>
              </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
              <button class="btn btn-danger" type="button" onclick="document.frmCadastro.reset()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Limpar</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row">
<div class="col-md-12">
  <div class="tile">
    <div class="tile-body">
      <div class="table-responsive">
        <table class="table  table-striped" id="tableUser">
          <thead>
            <tr>
              <th>Usuário</th>
              <th>Nome do Usuário</th>
              <th>Conta de E-mail</th>
              <th>Perfil do Usuário</th>
              <th>Status do Usuário</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $value) 
            <tr>
              <td>{{ $value->su_user }}</td>
              <td>{{ $value->su_name }}</td>
              <td>{{ $value->su_email }}</td>
              <td>{{ $value->su_group }}</td>
              <td>{{ $value->su_status }}</td>
              <td> 
                <a href="{{ route('editUser',  $value->su_id) }}"><i class="fa fa-edit"></i></a> 
                |
                <a href="{{ route('deleteUser',  $value->su_id) }}" onclick="javascript: return confirm('Deseja delete o usuário selecionado')" ><i class="fa fa-remove"></i></a> 
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
@endsection