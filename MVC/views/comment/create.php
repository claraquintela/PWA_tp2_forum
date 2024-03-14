{{ include('layouts/header.php', {title: 'Comment Create'} )}}


<div class="container">
    <h2>Comment Create</h2>
    <form method="post">

        <input type="hidden" name="forumId" value="">

        <label>Name
            <input type="text" name="userName" value="{{session.user_name}}" disabled>
        </label>
        <label>Title
            <input type="text" name="title" required>
        </label>
        <label>Comment
            <input type="text" name="comment" required>
        </label>



        <input type="submit" class="btn" value="Save">
    </form>
</div>

{{ include('layouts/footer.php')}}