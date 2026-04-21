const express = require('express');
const dotenv = require('dotenv');
const cors = require('cors');
const connectDB = require('./dbConfig');

// Load environment variables
dotenv.config();

// Initialize Express app
const app = express();

// Middleware
app.use(cors()); // Enable CORS
app.use(express.json()); // Parse JSON bodies
app.use(express.urlencoded({ extended: true })); // Parse URL-encoded bodies

// Routes
app.use('/students', require('./routes/studentRoutes'));

// Root route
app.get('/', (req, res) => {
  res.json({
    message: 'Welcome to Student Records API',
    version: '1.0.0',
    endpoints: {
      students: '/students'
    }
  });
});

// Connect to database and start server
const PORT = process.env.PORT || 5000;

connectDB().then(() => {
  app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
    console.log(`API available at http://localhost:${PORT}`);
  });
});