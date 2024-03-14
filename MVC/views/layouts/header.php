<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{ asset }}/css/styles.css">
</head>

<body>
    <header>
        <div class="header-nav">
            {% if session.user_id %}
            <a href="./"><img src="{{ asset }}/img/lttp_logo.png" alt="Logo" class="logo"></a>
            {% else %}
            <a href="{{base}}/login"><img src="{{ asset }}/img/lttp_logo.png" alt="Logo" class="logo"></a>
            {% endif %}
            <nav>
                <ul>
                    {% if session.user_id %}
                    <li><a href="{{base}}/forum">Forum</a></li>
                    {% endif %}
                    {% if session.privilege_id == 1 %}
                    <li><a href="{{base}}/dashboard">Log entries</a></li>
                    <li><a href="{{base}}/user/create">Add users</a></li>
                    {% endif %}
                    {% if guest %}
                    <li><a href="{{base}}/login">Login</a></li>
                    {% else %}
                    <li><a href="{{base}}/logout">Logout</a></li>
                    {% endif %}
                </ul>
            </nav>
        </div>
        <p class="header-salutation">
            {% if guest is empty %}
            Hello {{ session.user_name }}!
            {% endif%}
        </p>
    </header>
    <main>