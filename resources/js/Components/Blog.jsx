import React from 'react';
import Header from '../Commons/Header';

const About = () => {
    return (
        <>
            <main>

                <Header />

                <header className="site-header d-flex flex-column justify-content-center align-items-center">
                    <div className="container">
                        <div className="row">

                            <div className="col-lg-12 col-12 text-center">

                                <h2 className="mb-0">Blog Page</h2>
                            </div>

                        </div>
                    </div>
                </header>


                <section className="about-section section-padding" id="section_2">
                    <div className="container">
                        <div className="row">

                            <div className="col-lg-8 col-12 mx-auto">
                                <div className="pb-5 mb-5">
                                    <div className="section-title-wrap mb-4">
                                        <h4 className="section-title">Our story</h4>
                                    </div>

                                    <p>Pod Talk HTML CSS Template is made by Bootstrap v5.2.2 framework. You are allowed to
                                        modify and use this template for your business websites.</p>

                                    <p>You are not allowed to redistribute the downloadable template ZIP file on any other
                                        website without a permission. Please contact TemplateMo website for further information.
                                        Thank you.</p>

                                    <img src="frontEnd/images/medium-shot-young-people-recording-podcast.jpg"
                                        className="about-image mt-5 img-fluid" alt="" />
                                </div>
                            </div>

                            <div className="col-lg-12 col-12">
                                <div className="section-title-wrap mb-5">
                                    <h4 className="section-title">Meet podcaters</h4>
                                </div>
                            </div>

                            <div className="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                                <div className="team-thumb bg-white shadow-lg">
                                    <img src="frontEnd/images/profile/cute-smiling-woman-outdoor-portrait.jpg"
                                        className="about-image img-fluid" alt="" />

                                    <div className="team-info">
                                        <h4 className="mb-2">
                                            Taylor
                                            <img src="frontEnd/images/verified.png" className="verified-image img-fluid" alt="" />
                                        </h4>

                                        <span className="badge">Modeling</span>

                                        <span className="badge">Fashion</span>
                                    </div>

                                    <div className="social-share">
                                        <ul className="social-icon">
                                            <li className="social-icon-item">
                                                <a href="#" className="social-icon-link bi-twitter"></a>
                                            </li>

                                            <li className="social-icon-item">
                                                <a href="#" className="social-icon-link bi-facebook"></a>
                                            </li>

                                            <li className="social-icon-item">
                                                <a href="#" className="social-icon-link bi-pinterest"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div className="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                                <div className="team-thumb bg-white shadow-lg">
                                    <img src="frontEnd/images/profile/handsome-asian-man-listening-music-through-headphones.jpg"
                                        className="about-image img-fluid" alt="" />

                                    <div className="team-info">
                                        <h4 className="mb-2">
                                            William
                                            <img src="frontEnd/images/verified.png" className="verified-image img-fluid" alt="" />
                                        </h4>

                                        <span className="badge">Creative</span>

                                        <span className="badge">Design</span>
                                    </div>

                                    <div className="social-share">
                                        <ul className="social-icon">
                                            <li className="social-icon-item">
                                                <a href="#" className="social-icon-link bi-twitter"></a>
                                            </li>

                                            <li className="social-icon-item">
                                                <a href="#" className="social-icon-link bi-facebook"></a>
                                            </li>

                                            <li className="social-icon-item">
                                                <a href="#" className="social-icon-link bi-pinterest"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div className="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-0">
                                <div className="team-thumb bg-white shadow-lg">
                                    <img src="frontEnd/images/profile/smart-attractive-asian-glasses-male-standing-smile-with-freshness-joyful-casual-blue-shirt-portrait-white-background.jpg"
                                        className="about-image img-fluid" alt="" />

                                    <div className="team-info">
                                        <h4 className="mb-2">
                                            Chan
                                            <img src="frontEnd/images/verified.png" className="verified-image img-fluid" alt="" />
                                        </h4>

                                        <span className="badge">Education</span>
                                    </div>

                                    <div className="social-share">
                                        <ul className="social-icon">
                                            <li className="social-icon-item">
                                                <a href="#" className="social-icon-link bi-linkedin"></a>
                                            </li>

                                            <li className="social-icon-item">
                                                <a href="#" className="social-icon-link bi-whatsapp"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div className="col-lg-3 col-md-6 col-12">
                                <div className="team-thumb bg-white shadow-lg">
                                    <img src="frontEnd/images/profile/smiling-business-woman-with-folded-hands-against-white-wall-toothy-smile-crossed-arms.jpg"
                                        className="about-image img-fluid" alt="" />

                                    <div className="team-info">
                                        <h4 className="mb-2">
                                            Candice
                                            <img src="frontEnd/images/verified.png" className="verified-image img-fluid" alt="" />
                                        </h4>

                                        <span className="badge">Storytelling</span>

                                        <span className="badge">Business</span>
                                    </div>

                                    <div className="social-share">
                                        <ul className="social-icon">
                                            <li className="social-icon-item">
                                                <a href="#" className="social-icon-link bi-twitter"></a>
                                            </li>

                                            <li className="social-icon-item">
                                                <a href="#" className="social-icon-link bi-facebook"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </main>
        </>
    );
};

export default About;
