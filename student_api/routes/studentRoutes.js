const express = require('express');
const router = express.Router();
const {
  getAllStudents,
  getStudentById,
  createStudent,
  updateStudent,
  deleteStudent
} = require('../controllers/studentController');

// Route: /students
router.route('/')
  .get(getAllStudents)      // GET all students
  .post(createStudent);     // CREATE new student

// Route: /students/:id
router.route('/:id')
  .get(getStudentById)      // GET single student
  .put(updateStudent)       // UPDATE student
  .delete(deleteStudent);   // DELETE student

module.exports = router;