<x-mail::message>
# hello you got an inquiry!

<h1>Contact Form Submission</h1>
    <p>Name: {{ $data['name'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
     <p>Email: {{ $data['website'] }}</p>
    <p>Message: {{ $data['message'] }}</p>


<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
