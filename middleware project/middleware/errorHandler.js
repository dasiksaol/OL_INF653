// middleware/errorHandler.js

const { format } = require('date-fns');
const { v4: uuidv4 } = require('uuid');
const fs = require('fs');
const path = require('path');

const errorHandler = (err, req, res, next) => {
    const logId = uuidv4();
    const timestamp = format(new Date(), 'yyyy-MM-dd HH:mm:ss');

    const logEntry = `${logId} \t [${timestamp}] \t Name: ${err.name} \t Message: ${err.message} \t URL: ${req.url}\n`;

    // Ensure the logs directory exists
    const logsDir = path.join(__dirname, '..', 'logs');
    if (!fs.existsSync(logsDir)) {
        fs.mkdirSync(logsDir);
    }

    // Write error to errorLog.txt
    fs.promises.appendFile(path.join(logsDir, 'errorLog.txt'), logEntry)
        .catch(writeErr => console.error('Failed to write to error log:', writeErr));

    // Log to console as well
    console.error(`[ERROR] ${timestamp} - ${err.name}: ${err.message}`);

    // Send a proper response to the client
    const statusCode = err.status || 500;
    res.status(statusCode).send(`
        <h1>${statusCode} - ${err.name || 'Server Error'}</h1>
        <p>${err.message || 'An unexpected error occurred.'}</p>
        <a href="/">Go to Homepage</a>
    `);
};

module.exports = errorHandler;