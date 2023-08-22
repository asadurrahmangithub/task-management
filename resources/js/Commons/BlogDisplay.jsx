import React from 'react';
import { Link } from 'react-router-dom';
const BlogDisplay = ({ data }) => {
    return (
        <>


            {data.map(blog => (


                <div className="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0" key={blog.id}>
                    <div className="custom-block custom-block-overlay">

                        <Link to={`/blog-details/${blog.id}`} className="custom-block-image-wrap">
                            <img src={blog.image}
                                className="custom-block-image img-fluid" alt="" />
                        </Link>


                        <div className="custom-block-info custom-block-overlay-info">
                            <h5 className="mb-1">
                                <Link to={`/blog-details/${blog.id}`}>
                                    {blog.blog_title}
                                </Link>
                            </h5>

                            <p className="badge mb-0">{blog.date}</p>
                        </div>
                    </div>
                </div>

            ))}

        </>
    );
};

export default BlogDisplay;
