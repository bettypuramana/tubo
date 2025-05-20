@extends('layouts.user.user_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/user/css/aboutus.css') }}" />
@endsection
@section('content')

        <section class="hero-section">

        </section>

        <!-- About Section -->
        <section class="aboutus" id="aboutus-details">
            <h2>ABOUT US</h2>
            <p>Since TUBO's inception in 2014, we've grown continuously both organically and by becoming part of
                Obsidian
                Group. Our expertise and Services across a range of civil and industrial infrastructure construction
                activities, recognized not only for delivering complex activities in fast-track projects on time, on
                specs
                and within budget, but also for delivering integrated solutions to technical problems. Driven by
                steadfast
                determination, innovative solutions, visionary strategies, and a reliable contractor ethos, TUBO turns
                ambitions into tangible successes, expertly delivering projects of varying sizes and complexities with
                excellence. We are committed to delivering world-class services, adhering to the highest international
                standards and practices to ensure exceptional quality and efficiency in our projects. While we implemet
                global standards, we remain deeply rooted in local values and ethics, taking a responsible and
                community-focused approach. This blend of professionalism and ethical commitment positions us as a
                trusted partner in building a sustainable and prosperous furture. At TUBO, we thrive on complec
                projects, as they showcase our competitive edge. Our fast-track capabilities, coupled with a passion for
                technology, empower us to deliver exceptional results in even the most challenging environments and
                manage tight timelines with precision. There's no engineering challenge we can't solve when we listen,
                share ideas, push and support each other. This self-evident truth is at the heart of our culture and
                runs through our business. We're subject matter experts, but objective and technology agnostic. A team
                of engineers working together to solve problems and optimize performance, delivering sucess for our
                clients.</p>
        </section>

        <!-- Values Section -->
        <section class="values-aboutus">
            <h2>Values</h2>

            <div class="value-item">
                <img src="{{ asset('assets/user/images/aboutus-values/health-icon.png') }}" alt="Change Icon">
                <div class="value-content">
                    <div class="value-subtitle">
                        <h3>Health, Safety & Environment</h3>
                    </div>
                    <div class="value-text">
                        <p>safety is our number one core value. We are committed to the health & safety of our
                            employees, subcontractors, customers, and the community. We take our role in protecting the
                            environment very seriously, and we follow safe and sustainable practices in our workplaces.
                        </p>
                    </div>
                </div>
            </div>
            <div class="value-item">
                <img src="{{ asset('assets/user/images/aboutus-values/innovation-icon.png') }}" alt="Change Icon">
                <div class="value-content">
                    <div class="value-subtitle">
                        <h3>Innovation & Solutions</h3>
                    </div>
                    <div class="value-text">
                        <p>We believe that exceptional solutions are the results of dedication to fostering an
                            atmosphere of innovation and creative thinking. We have cultivated a culture that encourages
                            every team member to think beyond conventional limits, challenge norms and collaborate,
                            allowing the team to push boundaries and overcome obstacles. Our commitment to this
                            philosophy ensures that our solutions are not only effective but also flexible and
                            transformative.</p>
                    </div>
                </div>
            </div>
            <div class="value-item">
                <img src="{{ asset('assets/user/images/aboutus-values/ethics-icon.png') }}" alt="Ethics Icon">
                <div class="value-content">
                    <div class="value-subtitle">
                        <h3>Ethics & Integrity</h3>
                    </div>
                    <div class="value-text">
                        <p>We are professionals, and we strive to consistently live up to the ethics and integrity that
                            make up a professional. We conduct our business according to the highest ethical standards,
                            maintain openness and transparency in all our business relationships, and hold ourselves
                            accountable for what we do.
                        </p>
                    </div>
                </div>
            </div>
            <div class="value-item">
                <img src="{{ asset('assets/user/images/aboutus-values/excellence-icon.png') }}" alt="Excellence Icon">
                <div class="value-content">
                    <div class="value-subtitle">
                        <h3>Excellence & Competency</h3>
                    </div>
                    <div class="value-text">
                        <p>We follow pre-set and well-defined action plans that enable us to meet and surpass the
                            quality standards demanded by our clients. We make sure to excel at the core competencies
                            required for cost, time and quality control, and we strive for continued improvement.</p>
                    </div>
                </div>
            </div>
            <div class="value-item">
                <img src="{{ asset('assets/user/images/aboutus-values/meaningful change-icon.png') }}" alt="Change Icon">
                <div class="value-content">
                    <div class="value-subtitle">
                        <h3>Meaningful Change & Positive Legacy</h3>
                    </div>
                    <div class="value-text">
                        <p>Our team makes us who we are, and we are committed to supporting and developing the team,
                            empowering everyone on it to achieve their full potential. We are also an integral part of
                            the local communities in which we operate. As such, we take our commitment to the rules and
                            customs of these communities personally, striving to contribute positively and give back
                            wherever we can as part of fulfilling our corporate</p>
                    </div>
                </div>
            </div>

        </section>
        <section class="last-section">
            <div class="value-item2">
                <div class="safety-image">
                    <img src="{{ asset('assets/user/images/aboutus-values/safety-image.png') }}" alt="Safety Equipment">
                </div>
                <div class="safety-text">
                    <h2>SAFETY</h2>
                    <p class="subtitle-under"><strong>ZERO Accidents.<br>ZERO Safety Violations.<br>ZERO Regulatory
                            Violations.</strong></p>
                    <p class="text">TUBO is dedicated to introducing technologies, the highest industry standards and
                        practices that
                        can boost construction quality, productivity, protect our employees and minimize, if not
                        eliminate, any harm to nature and community.<br>This firm commitment to the community and
                        environment is complemented by a strategic, long-term investment in the safety education and
                        training of our staff resulted in a source of pride track record.
                    </p>
                </div>
            </div>


            <div class="value-item2">
                <div class="training-text">
                    <h2>TRAINING & TEAM DEVELOPMENT</h2>
                    <p class="subtitle-under"><strong>What began as a necessity has since evolved into a defining
                            hallmark of the
                            company</strong></p>
                    <ul class="text">
                        <li>When TUBO was founded, it was challenging to qualify for specialized projects without a
                            portfolio of achievements and successful delivery of previous projects. To overcome this,
                            beside acquiring top-of-the-line rigs and technology, the company chose to invest in its
                            people. Tubo implemented an extensive training plan that addressed every task, the necessary
                            skills, and potential safety hazards, ensuring safe and successful delivery, reinforced with
                            industry-recognized certifications.</li>
                        <li>This strategic focus enabled TUBO not only to meet pre-qualification requirements and launch
                            its operations, but also achieve remarkable outcomes and lay the groundwork for an
                            exceptional track record and sustainable growth benefiting both business and the people.
                        </li>
                        <li>TUBO’s dedication to its team has been the driving force behind countless success stories.
                            Dozens of employees have turned their roles into careers, growing alongside the company and
                            shaping its journey. These aren't just professional achievements; they're testaments to the
                            transformative power of opportunity.Today, training and development remain at the heart of
                            TUBOS's global strategy. This philosophy is about more than achieving business goals, it's
                            about empowering individuals and creating a culture of shared success. Every team memeber at
                            TUBO is a partner in the company's story, and their growth fuels TUBO's progress.</li>
                    </ul>
                </div>
                <div class="training-image">
                    <img src="{{ asset('assets/user/images/aboutus-values/training-photo.png') }}" alt="Training Blocks">
                </div>
            </div>
        </section>

@endsection
@section('js')
@endsection 