<form action="{{ route('curricolos.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br>
    
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required><br>
    
    <label for="telefone">Telefone:</label>
    <input type="tel" id="telefone" name="telefone" required><br>
    
    <label for="cargo">Cargo Desejado:</label>
    <input type="text" id="cargo" name="cargo" required><br>
    
    <label for="escolaridade">Escolaridade:</label>
    <select id="escolaridade" name="escolaridade" required>
        <option value="Ensino Fundamental">Ensino Fundamental</option>
        <option value="Ensino Médio">Ensino Médio</option>
        <option value="Graduação">Graduação</option>
        <option value="Pós-graduação">Pós-graduação</option>
        <option value="Mestrado">Mestrado</option>
        <option value="Doutorado">Doutorado</option>
    </select><br>
    
    <label for="observacoes">Observações:</label>
    <textarea id="observacoes" name="observacoes"></textarea><br>
    
    <label for="arquivo">Arquivo:</label>
    <input type="file" id="arquivo" name="arquivo" accept=".doc, .docx, .pdf" required><br>
    
    <button type="submit">Enviar</button>
    
</form>

@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif