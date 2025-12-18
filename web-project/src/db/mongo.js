const { MongoClient } = require('mongodb');

const uri = 'mongodb://localhost:27017'; // Replace with your MongoDB connection string
const client = new MongoClient(uri, { useNewUrlParser: true, useUnifiedTopology: true });

let db;

const connectDB = async () => {
    try {
        await client.connect();
        db = client.db('web_project'); // Replace with your database name
        console.log('MongoDB connected successfully');
    } catch (error) {
        console.error('MongoDB connection error:', error);
        process.exit(1);
    }
};

const getDB = () => {
    if (!db) {
        throw new Error('Database not initialized. Call connectDB first.');
    }
    return db;
};

module.exports = { connectDB, getDB };