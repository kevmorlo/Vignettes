export default Index;
import React, { useEffect, useState } from 'react';
import axios from 'axios';

const Index = () => {
    const [categories, setCategories] = useState([]);

    useEffect(() => {
        axios.get('/category')
            .then(response => {
                setCategories(response.data);
            })
            .catch(error => {
                console.error(error);
            });
    }, []);

    return (
        <div>
            <h1>Catégories</h1>
            <ul>
                {categories.map((category, index) => (
                    <li key={index}>{category}</li>
                ))}
            </ul>
        </div>
    );
};