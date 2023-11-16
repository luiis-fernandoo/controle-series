<x-layout title="Login"> 

    <form method="post">
        @csrf
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" name="email">

            <label for="password" class="form-label">Senha:</label>
            <input type="password" class="form-control" name="password">
        <button type="submit" class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
    <a href="{{ route('users.create') }}"><button class="btn btn-secondary">Registrar</button></a>

</x-layout>