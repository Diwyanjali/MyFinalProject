<x-mail::message>
# Your Appointment is confirmed

Dear {{ $customer }},

We hope this email finds you well. This is to confirm your upcoming medical appointment with {{ $doctor }} at {{ config('app.name') }}'s Medical Center.

Appointment Details:

Doctor: {{$doctor}}

Date: {{ $appointment_date }}

Time: {{$appointment_time}}

We look forward to seeing you on {{$appointment_date}} and assisting you with your healthcare needs.

Wishing you good health,<br>
{{ config('app.name') }}
</x-mail::message>
