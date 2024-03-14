{{ include('layouts/header.php', {title: 'Forum Show'} )}}


<div class="container">
    <h2>Forum</h2>

    <div class="post-card">
        {% if forum.image %}
        <div class="post-photo_container">
            <img src="{{base}}/uploads/{{forum.image}}" alt="{{forum.title}}" class="post_photo" />
        </div>
        {% endif %}
        <p><strong>Title: </strong>{{forum.title}}</p>
        <p><strong>Post: </strong>{{ forum.post}}</p>
        <p><strong>Posted by: </strong>{{ forum.userName}}</p>
        <p><strong>Date: </strong>{{ forum.dateTime}}</p>


        <div class="form_btns">

            <a href="{{base}}/forum" class="btn block">Forum</a>

            {% if session.user_id == forum.userId %}
            <a href="{{base}}/forum/edit?id={{forum.id}}" class="btn block">Edit</a>

            <form action="{{base}}/forum/delete" method="post">
                <input type="hidden" name="id" value="{{forum.id}}">
                <button class="btn block"> Delete</button>
            </form>
            {% endif %}
        </div>
    </div>



</div>

{{ include('layouts/footer.php')}}