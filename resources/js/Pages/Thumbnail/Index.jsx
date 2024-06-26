export default Index;
import React, { useEffect, useState } from 'react';
import axios from 'axios';

const Index = () => {
    const [categories, setCategories] = useState([]);

    useEffect(() => {
        axios.get('/thumbnail')
            .then(response => {
                setCategories(response.data);
            })
            .catch(error => {
                console.error(error);
            });
    }, []);

    return (
        <div>
            <h1>Vignettes</h1>
            <ul>
                {categories.map((thumbnail, index) => (
                    <li key={index}>{thumbnail}</li>
                ))}
            </ul>
        </div>
    );
};