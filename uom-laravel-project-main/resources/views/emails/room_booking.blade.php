<x-mail::message>
# Reservation confirmed

Dear {{ $customer }},

Thank you for choosing {{ config('app.name') }} for your upcoming reservation. We are delighted to confirm your booking and look forward to hosting you.

Reservation Details:

Room Category: {{ $category }}

Check-In: {{ $check_in }}

Check-Out: {{ $check_out }}

Number of Rooms: {{ $no_of_rooms }}

Once again, thank you for choosing {{ config('app.name') }}. We can't wait to welcome you and make your experience memorable.

Best regards,<br>
{{ config('app.name') }}
</x-mail::message>
