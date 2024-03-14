{{ include('layouts/header.php', {title: 'Post Create'} )}}


<div class="container">
    <h2>Post Create</h2>
    <form method="post" class="form-post" enctype="multipart/form-data">

        <label>Title
            <input type="text" name="title" required>
        </label>
        <label>Post
            <textarea class="textarea-post" name="post" required></textarea>
        </label>
        <label>
            Select image to upload:
            <input type="file" name="image">
        </label>

        <input type="hidden" name="userName" value="{{session.user_name}}">
        <input type="hidden" name="userId" value="{{session.user_id}}">

        <input type="submit" class="btn" value="Save">
    </form>
</div>

{{ include('layouts/footer.php')}}  