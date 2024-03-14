{{ include('layouts/header.php', { title: 'Comment'})}}

<h1>Comment</h1>
<table>
    <thead>
        <tr>
            <th>Student</th>
            <th>Course</th>
            <th>Comment</th>
        </tr>
    </thead>
    <tbody>
        {% for comment in comments%}

        <tr>
            <td><a href="{{BASE}}comment/show?id={{comment.id}}">{{comment['comment']}}</a></td>
            <td>{{ comment['class_course_id'] }}</td>
            <td>{{ comment['comment'] }}</td>

        </tr>

        {% endfor %}

    </tbody>
</table>
<a href="{{BASE}}comment/create" class="btn">Create a Comment </a>

{{ include('layouts/footer.php')}}