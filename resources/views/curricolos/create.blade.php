@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="card-body">
            <form action="{{ route('curricolos.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>

                    <div class="col-6 mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="col-6 mb-3">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="tel" class="form-control" id="telefone" name="telefone" required>
                    </div>

                    <div class="col-4 mb-3">
                        <label for="cargo" class="form-label">Cargo Desejado:</label>
                        <input type="text" class="form-control" id="cargo" name="cargo" required>
                    </div>

                    <div class="col-4 mb-3">
                        <label for="escolaridade" class="form-label">Escolaridade:</label>
                        <select id="escolaridade" name="escolaridade" class="form-select" required>
                            <option value="Ensino Fundamental">Ensino Fundamental</option>
                            <option value="Ensino Médio">Ensino Médio</option>
                            <option value="Graduação">Graduação</option>
                            <option value="Pós-graduação">Pós-graduação</option>
                            <option value="Mestrado">Mestrado</option>
                            <option value="Doutorado">Doutorado</option>
                        </select>
                    </div>

                    <div class="col-4 mb-3">
                        <label for="arquivo" class="form-label">Curriculum vitae:</label>
                        <input type="file" class="form-control" id="arquivo" name="arquivo" accept=".doc, .docx, .pdf" required>
                    </div>

                    <div class="mb-3">
                        <label for="observacoes" class="form-label">Observações:</label>
                        <textarea id="observacoes" name="observacoes" class="form-control"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>
@endsection