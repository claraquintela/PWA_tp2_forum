{{ include('layouts/header.php', {title: 'Comment Edit'} )}}

<div class="container">
    <h2>Comment Edit</h2>
    <form method="post" class="form_form">

        <label>
            <input type="hidden" name="id" value="{{comments.id}}">
        </label>

        <label>Student ID
            <input type="text" name="class_students_id" value="{{comments.class_students_id}}">
        </label>
        {% if errors.name is defined %}
        <span class="error">{{ errors.name }}</span>
        {% endif %}
        <label>Course ID
            <input type="text" name="class_course_id" value="{{ comments.class_course_id}}">
        </label>
        {% if errors.address is defined %}
        <span class="error">{{ errors.address}}</span>
        {% endif %}
        <label>Comment
            <input type="text" name="comment" value="{{ comments.comment}}">
        </label>
        {% if errors.zip_code is defined %}
        <span class="error">{{ errors.zipcode}}</span>
        {% endif %}

        <input type="submit" class="btn" value="Update">
    </form>
</div>


{{ include('layouts/footer.php')}}