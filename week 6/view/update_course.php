<?php include('header.php'); ?>

<section class="course-container">
    <h2>Update Course</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="update_course">
        <input type="hidden" name="course_id" value="<?= $course['courseID'] ?>">

        <input type="text" name="course_name" value="<?= htmlspecialchars($course['courseName']) ?>" maxlength="30" required>

        <button type="submit">Update</button>
        <a href=".?action=list_courses">Cancel</a>
    </form>
</section>

<?php include('footer.php'); ?>