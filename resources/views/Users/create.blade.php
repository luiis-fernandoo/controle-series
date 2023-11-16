<x-layout title="Cadrastro"> 

    <form method="post">
        @csrf
            <label for="nome" class="form-label">Nome:</label>
            <input type="nome" class="form-control" name="name">

            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" name="email">

            <label for="password" class="form-label">Senha:</label>
            <input type="password" class="form-control" name="password">
        <button type="submit" class="btn btn-primary mt-2 mb-2">Salvar</button>
    
    </form>
</x-layout>