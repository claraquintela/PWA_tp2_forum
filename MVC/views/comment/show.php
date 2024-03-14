{{ include('layouts/header.php', {title: 'Comment Show'} )}}


<div class="container">
    <h2>Comment Show</h2>

    <div class="post-card">
        <p><strong>Student: </strong>{{ comment.class_students_id}}</p>
        <p><strong>Course: </strong>{{ comment.class_course_id}}</p>
        <p><strong>Comment: </strong>{{ comment.comment}}</p>


        <div class="form_btns">
            <a href="{{base}}/comment" class="btn block">Home</a>
            
            <a href="{{base}}/comment/edit?id={{comment.id}}" class="btn block">Edit</a>
        </div>
    </div>

    <form action="{{base}}/comment/delete" method="post">
        <input type="hidden" name="id" value="{{comment.id}}">
        <button class="btn block red"> Delete</button>
    </form>

</div>

{{ include('layouts/footer.php')}}