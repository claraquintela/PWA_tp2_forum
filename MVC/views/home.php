{{ include('layouts/header.php', {title: 'Le tricot du temps perdu'} )}}


<h1>Forum</h1>

<div class="post-show">

    {% for post in forum %}

    <div class="post-card">
        <div class="post-title"><a href="{{BASE}}forum/show?id={{post.id}}">{{post['title']}}</a> </div>
        <div class="post-post">{{ post['post'] }}</div>
        <div class="post-author"><strong>Author:</strong> {{ post['userName'] }}</div>
        <div class="post-date">{{ post['dateTime'] }}</div>
    </div>

    {% endfor %}

    <a href="{{BASE}}forum/create" class="btn">Créer un post</a>

</div>

{{ include('layouts/footer.php')}}