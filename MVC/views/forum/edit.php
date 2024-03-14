{{ include('layouts/header.php', {title: 'Post Edit'} )}}

<div class="container">
    <h2>Post Edit</h2>
    <form method="post" class="form-post form">

        <label>
            <input type="hidden" name="id" value="{{forum.id}}">
        </label>
        <label>Title
            <input type="text" name="title" value="{{forum.title}}">
        </label>
        {% if errors.title is defined %}
        <span class="error">{{ errors.title}}</span>
        {% endif %}
        <label>Post
            <textarea name="post" class="textarea-post">{{forum.post}}</textarea>
        </label>
        {% if errors.post is defined %}
        <span class="error">{{ errors.post}}</span>
        {% endif %}

        <input type="submit" class="btn" value="Update">
    </form>
</div>


{{ include('layouts/footer.php')}}