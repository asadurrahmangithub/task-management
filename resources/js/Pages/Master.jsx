import React from 'react';

import Home from '../Components/Home';
import Blog from '../Components/Blog';
import Contact from '../Components/Contact';
import ListingPage from '../Components/ListingPage';
import BlogDetails from '../Components/BlogDetails';
import { Routes,Route } from 'react-router-dom'

const Test = () => {
    return (


            <Routes>
                <Route path='/' element={<Home />} />
                <Route path='/blog' element={<Blog/>}/>
                <Route path='/listing-page' element={<ListingPage/>}/>
                <Route path='/contact' element={<Contact/>}/>
                <Route path='/blog-details/:id' element={<BlogDetails/>}/>
            </Routes>

    )
}

export default Test
