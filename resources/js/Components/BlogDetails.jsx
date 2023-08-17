import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { Link,useParams } from 'react-router-dom';





const BlogDetails = () => {

    let { id } = useParams();

    const [blogData, setblogData] = useState({});


    useEffect(() => {
        axios.get(`/api/blog-details/${id}`).then(res => {
            // console.log("get_data:",res.data)
            setblogData(res.data);
        })
    }, [id]);

    // console.log(id);
    // console.log(blogData.image);
    if (!blogData) {
        return <div>Loading......</div>;
    }

    // console.log(blogData.image)

    return (
        <>


            <header className="site-header d-flex flex-column justify-content-center align-items-center">
                <div className="container">
                    <div className="row">

                        <div className="col-lg-12 col-12 text-center">

                            <h2 className="mb-0">Detail Page</h2>
                        </div>

                    </div>
                </div>
            </header>


            <section className="latest-podcast-section section-padding pb-0" id="section_2">
                <div className="container">
                    <div className="row justify-content-center">

                        <div className="col-lg-10 col-12">
                            <div className="section-title-wrap mb-5">
                                <h4 className="section-title">{blogData.blog_title}</h4>
                            </div>

                            <div className="row">
                                <div className="col-lg-3 col-12">
                                    <div className="custom-block-icon-wrap">
                                        <div className="custom-block-image-wrap custom-block-image-detail-page">
                                            <img src={`http://127.0.0.1:8000/${blogData.image}`} className="custom-block-image img-fluid" alt="" />
                                        </div>
                                    </div>
                                </div>

                                <div className="col-lg-9 col-12">
                                    <div className="custom-block-info">
                                        <div className="custom-block-top d-flex mb-1">
                                            <small className="me-4">
                                                <Link href="#">
                                                    <i className="bi-play"></i>
                                                    Play now
                                                </Link>
                                            </small>

                                            <small>
                                                <i className="bi-clock-fill custom-icon"></i>
                                                50 Minutes
                                            </small>

                                            <small className="ms-auto">Episode <span className="badge">15</span></small>
                                        </div>

                                        <h2 className="mb-2">Modern Vintage</h2>

                                        <p>{blogData.elm1}</p>

                                        <div
                                            className="profile-block profile-detail-block d-flex flex-wrap align-items-center mt-5">
                                            <div className="d-flex mb-3 mb-lg-0 mb-md-0">
                                                <img src="http://127.0.0.1:8000/frontEnd/images/pod-talk-logo.png"
                                                    className="profile-block-image img-fluid" alt="" />

                                                <p>
                                                    Elsa
                                                    <img src="http://127.0.0.1:8000/frontEnd/images/verified.png" className="verified-image img-fluid" alt="" />
                                                    <strong>Influencer</strong>
                                                </p>
                                            </div>

                                            <ul className="social-icon ms-lg-auto ms-md-auto">
                                                <li className="social-icon-item">
                                                    <Link href="#" className="social-icon-link bi-instagram"></Link>
                                                </li>

                                                <li className="social-icon-item">
                                                    <Link href="#" className="social-icon-link bi-twitter"></Link>
                                                </li>

                                                <li className="social-icon-item">
                                                    <Link href="#" className="social-icon-link bi-whatsapp"></Link>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section className="related-podcast-section section-padding">
                <div className="container">
                    <div className="row">

                        <div className="col-lg-12 col-12">
                            <div className="section-title-wrap mb-5">
                                <h4 className="section-title">Related episodes</h4>
                            </div>
                        </div>

                        <div className="col-lg-4 col-12 mb-4 mb-lg-0">
                            <div className="custom-block custom-block-full">
                                <div className="custom-block-image-wrap">
                                    <Link href="detail-page.html">
                                        <img src="http://127.0.0.1:8000/frontEnd/images/podcast/27376480_7326766.jpg" className="custom-block-image img-fluid"
                                            alt="" />
                                    </Link>
                                </div>

                                <div className="custom-block-info">
                                    <h5 className="mb-2">
                                        <Link href="detail-page.html">
                                            Vintage Show
                                        </Link>
                                    </h5>

                                    <div className="profile-block d-flex">
                                        <img src="http://127.0.0.1:8000/frontEnd/images/profile/woman-posing-black-dress-medium-shot.jpg"
                                            className="profile-block-image img-fluid" alt="" />

                                        <p>Elsa
                                            <strong>Influencer</strong>
                                        </p>
                                    </div>

                                    <p className="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                                    <div className="custom-block-bottom d-flex justify-content-between mt-3">
                                        <Link href="#" className="bi-headphones me-1">
                                            <span>100k</span>
                                        </Link>

                                        <Link href="#" className="bi-heart me-1">
                                            <span>2.5k</span>
                                        </Link>

                                        <Link href="#" className="bi-chat me-1">
                                            <span>924k</span>
                                        </Link>
                                    </div>
                                </div>

                                <div className="social-share d-flex flex-column ms-auto">
                                    <Link href="#" className="badge ms-auto">
                                        <i className="bi-heart"></i>
                                    </Link>

                                    <Link href="#" className="badge ms-auto">
                                        <i className="bi-bookmark"></i>
                                    </Link>
                                </div>
                            </div>
                        </div>

                        <div className="col-lg-4 col-12 mb-4 mb-lg-0">
                            <div className="custom-block custom-block-full">
                                <div className="custom-block-image-wrap">
                                    <Link href="detail-page.html">
                                        <img src="http://127.0.0.1:8000/frontEnd/images/podcast/27670664_7369753.jpg" className="custom-block-image img-fluid"
                                            alt="" />
                                    </Link>
                                </div>

                                <div className="custom-block-info">
                                    <h5 className="mb-2">
                                        <Link href="detail-page.html">
                                            Vintage Show
                                        </Link>
                                    </h5>

                                    <div className="profile-block d-flex">
                                        <img src="http://127.0.0.1:8000/frontEnd/images/profile/cute-smiling-woman-outdoor-portrait.jpg"
                                            className="profile-block-image img-fluid" alt="" />

                                        <p>
                                            Taylor
                                            <img src="http://127.0.0.1:8000/frontEnd/images/verified.png" className="verified-image img-fluid" alt="" />
                                            <strong>Creator</strong>
                                        </p>
                                    </div>

                                    <p className="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                                    <div className="custom-block-bottom d-flex justify-content-between mt-3">
                                        <Link href="#" className="bi-headphones me-1">
                                            <span>100k</span>
                                        </Link>

                                        <Link href="#" className="bi-heart me-1">
                                            <span>2.5k</span>
                                        </Link>

                                        <Link href="#" className="bi-chat me-1">
                                            <span>924k</span>
                                        </Link>
                                    </div>
                                </div>

                                <div className="social-share d-flex flex-column ms-auto">
                                    <Link href="#" className="badge ms-auto">
                                        <i className="bi-heart"></i>
                                    </Link>

                                    <Link href="#" className="badge ms-auto">
                                        <i className="bi-bookmark"></i>
                                    </Link>
                                </div>
                            </div>
                        </div>

                        <div className="col-lg-4 col-12">
                            <div className="custom-block custom-block-full">
                                <div className="custom-block-image-wrap">
                                    <Link href="detail-page.html">
                                        <img src="http://127.0.0.1:8000/frontEnd/images/podcast/12577967_02.jpg" className="custom-block-image img-fluid"
                                            alt="" />
                                    </Link>
                                </div>

                                <div className="custom-block-info">
                                    <h5 className="mb-2">
                                        <Link href="detail-page.html">
                                            Daily Talk
                                        </Link>
                                    </h5>

                                    <div className="profile-block d-flex">
                                        <img src="http://127.0.0.1:8000/frontEnd/images/profile/handsome-asian-man-listening-music-through-headphones.jpg"
                                            className="profile-block-image img-fluid" alt="" />

                                        <p>
                                            William
                                            <img src="frontEnd/images/verified.png" className="verified-image img-fluid" alt="" />
                                            <strong>Vlogger</strong>
                                        </p>
                                    </div>

                                    <p className="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                                    <div className="custom-block-bottom d-flex justify-content-between mt-3">
                                        <Link href="#" className="bi-headphones me-1">
                                            <span>100k</span>
                                        </Link>

                                        <Link href="#" className="bi-heart me-1">
                                            <span>2.5k</span>
                                        </Link>

                                        <Link href="#" className="bi-chat me-1">
                                            <span>924k</span>
                                        </Link>
                                    </div>
                                </div>

                                <div className="social-share d-flex flex-column ms-auto">
                                    <Link href="#" className="badge ms-auto">
                                        <i className="bi-heart"></i>
                                    </Link>

                                    <Link href="#" className="badge ms-auto">
                                        <i className="bi-bookmark"></i>
                                    </Link>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


        </>
    );
};

export default BlogDetails;
