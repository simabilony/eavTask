<form action="{{ route('entities.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Entity Name">
    <input type="text" name="attributes[0][name]" placeholder="Attribute Name">
    <input type="text" name="attributes[0][type]" placeholder="Attribute Type">
    <input type="text" name="attributes[0][value]" placeholder="Attribute Value">
    <button type="submit">Add Entity</button>
</form>
