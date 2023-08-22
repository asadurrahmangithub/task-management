import React from 'react';
import Header from '../Commons/Header';

const Contact = () => {
    return (
        <>
            <main>

                <Header />


                <header className="site-header d-flex flex-column justify-content-center align-items-center">
                    <div className="container">
                        <div className="row">

                            <div className="col-lg-12 col-12 text-center">

                                <h2 className="mb-0">Contact Page</h2>
                            </div>

                        </div>
                    </div>
                </header>


                <section className="section-padding" id="section_2">
                    <div className="container">
                        <div className="row justify-content-center">

                            <div className="col-lg-5 col-12 pe-lg-5">
                                <div className="contact-info">
                                    <h3 className="mb-4">We love to help you. Get in touch</h3>

                                    <p className="d-flex border-bottom pb-3 mb-4">
                                        <strong className="d-inline me-4">Phone:</strong>
                                        <span>010-020-0340</span>
                                    </p>

                                    <p className="d-flex border-bottom pb-3 mb-4">
                                        <strong className="d-inline me-4">Email:</strong>
                                        <a href="#">inquiry@pod.co</a>
                                    </p>

                                    <p className="d-flex">
                                        <strong className="d-inline me-4">Location:</strong>
                                        <span>1355 Market Street, Downtown San Francisco, California</span>
                                    </p>
                                </div>
                            </div>

                            {/* <div className="col-lg-5 col-12 mt-5 mt-lg-0">
                            <iframe className="google-map"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.819917806043!2d103.84793601429608!3d1.281807962148459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da190c2c94ccb3%3A0x11213560829baa05!2sTwitter!5e0!3m2!1sen!2smy!4v1669212183861!5m2!1sen!2smy"
                                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div> */}

                        </div>
                    </div>
                </section>

                <section className="contact-section section-padding pt-0">
                    <div className="container">
                        <div className="row">

                            <div className="col-lg-8 col-12 mx-auto">
                                <div className="section-title-wrap mb-5">
                                    <h4 className="section-title">You know, Contact Form</h4>
                                </div>

                                <form action="#" method="post" className="custom-form contact-form" role="form">
                                    <div className="row">
                                        <div className="col-lg-6 col-md-6 col-12">
                                            <div className="form-floating">
                                                <input type="text" name="full-name" id="full-name" className="form-control"
                                                    placeholder="Full Name" required="" />

                                                <label for="floatingInput">Full Name</label>
                                            </div>
                                        </div>

                                        <div className="col-lg-6 col-md-6 col-12">
                                            <div className="form-floating">
                                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                                    className="form-control" placeholder="Email address" required="" />

                                                <label for="floatingInput">Email address</label>
                                            </div>
                                        </div>

                                        <div className="col-lg-12 col-12">
                                            <div className="form-floating">
                                                <input type="text" name="company" id="name" className="form-control"
                                                    placeholder="Name" required="" />

                                                <label for="floatingInput">Company</label>
                                            </div>

                                            <div className="form-floating">
                                                <textarea className="form-control" id="message" name="message"
                                                    placeholder="Describe message here"></textarea>

                                                <label for="floatingTextarea">Describe message here</label>
                                            </div>
                                        </div>

                                        <div className="col-lg-4 col-12 ms-auto">
                                            <button type="submit" className="form-control">Submit</button>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </section>
            </main>
        </>
    );
};

export default Contact;
