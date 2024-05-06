@extends("template.main") 
@section('title', 'Contact Us') 
@section('body')
<div class="row d-flex justify-content-center m-5">
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
        @foreach($contacts as $index => $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->message }}</td>
            <td>
                <form method="POST" action="/contact/delete/{{ $index }}">
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection
