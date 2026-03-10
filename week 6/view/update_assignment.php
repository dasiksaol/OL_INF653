<?php include('header.php'); ?>

<section class="assignment-container">
    <h2>Update Assignment</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="update_assignment">
        <input type="hidden" name="assignment_id" value="<?= $assignment['ID'] ?>">

        <input type="text" name="description" value="<?= htmlspecialchars($assignment['Description']) ?>" maxlength="120" required>

        <select name="course_id" required>
            <?php foreach ($courses as $course) : ?>
                <option value="<?= $course['courseID'] ?>" <?= $course['courseID'] == $assignment['courseID'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($course['courseName']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Update</button>
        <a href=".?action=list_assignments">Cancel</a>
    </form>
</section>

<?php include('footer.php'); ?>