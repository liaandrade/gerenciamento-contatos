<form method="POST" action="{{route('contacts.update', $contact->id)}}">
     @csrf
    @method('PUT') 

    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" value="{{$contact->name}}">

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" value="{{$contact->email}}">

    <label for="phone">Telefone:</label>
    <input type="text" id="phone" name="phone" value="{{$contact->phone}}">

    <label for="address">Endereço:</label>
    <input type="text" id="address" name="address" value="{{$contact->address}}">

    <button type="submit">Salvar</button>
</form>