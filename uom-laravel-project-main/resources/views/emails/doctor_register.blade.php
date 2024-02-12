<x-mail::message>
# Thank You for Joining {{ config('app.name') }} - Your Login Credentials

Dear {{ $doctor_name }},

Congratulations and welcome to {{ config('app.name') }}'s Medical Center. We are thrilled to have you as a part of our team/community, and we sincerely appreciate your decision to join us.

As promised, here are your login credentials to access your account:

Username: {{ $email }}

Password: {{ $password }}

Please use these credentials to log in to our platform at {{ config('app.url')}}. For security purposes, we recommend that you change your password upon your first login.

Once again, welcome to {{ config('app.name') }}. We're excited to have you on board and look forward to achieving great things together!

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
