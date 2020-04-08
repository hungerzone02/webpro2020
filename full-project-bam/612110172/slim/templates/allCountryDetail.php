<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="{{base_path()}}\css\allcountry.css">
    <title>Covid-19</title>
</head>

<body>
    <h1>&times;All Country Detail&times;</h1>
    <div class="button">
    <button><a href="{{url_for('home')}}">Home </a></button>
	<button><a href="{{url_for('service')}}">Service </a></button>
    <button class="active"><a href="{{url_for('information')}}">Information</a></button>
    <button class="active"><a href="{{url_for('allCountryDetail')}}">All Country Detail</a></button>
    <button><a href="{{url_for('form')}}">Make Measure Form</a></button>
    <button class="active"><a href="{{url_for('login')}}">Logout</a></button>
    </div>
    <br>
    <table>
        <tr>
            <th>Country</th>
            <th>Addict</th>
            <th>Waste</th>
            <th>Recovered</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    {% for listCountry in list %}
        <tr>
            <td>{{ listCountry.Country }}</td>
            <td>{{ listCountry.addict | number_format }}</td>
            <td>{{ listCountry.waste | number_format }}</td>
            <td>{{ listCountry.hill | number_format }}</td>
            <td><button><a href="#" class="update">Update</a></button></td>
            <td><button><a href="{{url_for('dropCountry')}}" class="delete">Delete</a></button></td>
        </tr>
    {% endfor %}
    </table>   
    
</body>

</html>