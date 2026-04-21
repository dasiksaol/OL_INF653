const mongoose = require('mongoose');

// Define the Student schema
const studentSchema = new mongoose.Schema(
  {
    firstName: {
      type: String,
      required: [true, 'First name is required'],
      trim: true,
      minlength: [2, 'First name must be at least 2 characters long'],
      maxlength: [50, 'First name cannot exceed 50 characters']
    },
    lastName: {
      type: String,
      required: [true, 'Last name is required'],
      trim: true,
      minlength: [2, 'Last name must be at least 2 characters long'],
      maxlength: [50, 'Last name cannot exceed 50 characters']
    },
    email: {
      type: String,
      required: [true, 'Email is required'],
      unique: true,
      trim: true,
      lowercase: true,
      match: [
        /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
        'Please provide a valid email address'
      ]
    },
    course: {
      type: String,
      required: [true, 'Course is required'],
      trim: true,
      minlength: [2, 'Course name must be at least 2 characters long'],
      maxlength: [100, 'Course name cannot exceed 100 characters']
    },
    enrolledDate: {
      type: Date,
      default: Date.now,
      required: [true, 'Enrollment date is required']
    }
  },
  {
    timestamps: true // Automatically adds createdAt and updatedAt
  }
);

// Create and export the Student model
const Student = mongoose.model('Student', studentSchema);

module.exports = Student;