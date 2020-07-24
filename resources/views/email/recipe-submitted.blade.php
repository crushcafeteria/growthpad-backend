@component('mail::message')

You have an new recipe submission.

@component('mail::panel')
Name: {{ $fields['name']}} <br>
Telephone: {{ $fields['telephone']}} <br>
Email: {{ $fields['email']}} <br>
Location: {{ $fields['county']}} {{ $fields['country']}} <br>
Category: {{ $fields['category']}} <br>
Recipe Name: {{ $fields['recipe_name']}} <br>
Category: {{ $fields['food_category']}} <br>
Ingredients: {{ $fields['ingredients']}} <br>
Procedure: {{ $fields['procedure']}} <br>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
