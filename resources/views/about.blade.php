@extends("masterpage")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 style="font-family: Georgia">
                            Welcome to My Tunnel Vision. We designed this page to help you navigate your way through the
                            website easily and get the most out of your experience on our website. If you wish to
                            understand a certain part in the website feel free to click on one of the links below and it
                            will take you directly to the section you require.
                        </h4>

                        <div class="panel-body">
                            <ul>
                                <li><a href="#signup">Signup</a></li>
                                <li><a href="#admin">Becoming an Admin</a></li>
                                <li><a href="#tags">Tags</a></li>
                                <li><a href="#private">Personalized Advice</a></li>
                                <li><a href="#public">Public Advice</a></li>
                                <li><a href="#feedback">Feedback</a></li>
                            </ul>
                        </div>
                        <div id="signup">
                            <a style="text-decoration: none" href="{{url('/auth/register')}}"><h2>SignUp</h2></a>

                            <p>
                                The process of signing up and creating an account is pretty straightforward on the
                                website.
                                Just click the sign up button, fill the information and respond to the confirmation
                                email
                                and voilà!
                            </p>

                            <p>
                                We urge you to use your real gender and recommend that you use your real information
                                while
                                signing up. While posting, you have the option to use (or not use) the anonymous button,
                                which determines the privacy of your personal information.
                                If it makes you feel safer however, feel free to use a fake name.
                            </p>

                            <p>
                                The real question is what do you gain from signing up to My Tunnel Vision? As an
                                unregistered user on the website you will only find use at the home page. What’s
                                available
                                there is a stream of updates from anyone that posts anything publicly on the website.
                                You
                                can view them all no matter their assigned tags however, you may not comment on them. As
                                a
                                verified user you can request to add tags, use public posting, ask personalized advice,
                                comment on public posts, use the like/dislike feature on posts, and can become an admin
                                alongside the creators of the website.
                            </p>

                        </div>

                        <div id="admin">
                            <h2>Becoming an Admin</h2>

                            <p>
                                This is a tool we plan to use to expand our personalized advice workforce. Some activity
                                on the website will be monitored to keep an eye out for exceptional advice givers out
                                there. If the public reacts well to most of their content, then that said person would
                                receive an email from us detailing that he/she has been invited (yes, you may decline if
                                you want) to become an admin. Perks of being an admin are that you can actually view
                                personalized advice requests, reply to them if his/her qualifications reflect the
                                requester’s requirements, and accept or reject requested tags. May the odds ever be in
                                your favor, and keep the positive energy flowing!

                            </p>

                        </div>


                        <div id="tags">
                            <a style="text-decoration: none" href="{{route('tags.index')}}"><h2>Tags</h2></a>

                            <p>
                                Tags are the main operating point of the website. It’s the tool used to categorize your
                                posts. If you are a registered user, you may choose to subscribe to topics with a
                                certain tag to only see what interests you. If you are posting something publicly, tag
                                it with related topics so that people that are interested in your issue can see it. If
                                your tag is not available, to avoid redundancy you can request it and per review by
                                admins to make sure its not they’re in another form it will be accepted or rejected.
                                While sending in personalized advice requests you can use tags to determine aspects that
                                should belong to the person that will be giving you advice. For an example, you may
                                choose a female 19-year-old girl to give you advice in English that specializes in
                                family troubles to give you advice. This way you can personally tailor the person that
                                you’re asking for advice through the power of tags based on your needs.

                            </p>

                        </div>


                        <div id="private">
                            <a style="text-decoration: none" href="{{ route('posts.create') }}"><h2>Personalized Advice</h2></a>

                            <p>
                                This feature is the main reason why we made this website, you can read more about that
                                in the about us page. Personalized advice is a tool you can use to request advice from a
                                specific person on the admin workforce. Lets say you a 20 year old woman that doesn’t
                                know what would be a great gift for your significant other on valentines day. So you
                                would send in a request for an 18-21 year old guy, with the preferred language you want
                                him to respond in (we recommend that you tag more than one language in the case your
                                preferred language is not available), and with the specialty of relationships. With some
                                information that you’re willing to give about your Significant other a person from the
                                admin team based on you description will try to assist you as best he/she can. We
                                recommend that you give all the relevant information you can to help us assist you
                                better. Your information is safe and no one will see any of the information you post
                                except the person giving you the advice.
                            </p>
                        </div>

                        <div id="public">
                            <a style="text-decoration: none" href="{{ route('posts.create') }}"><h2>Public Advice</h2></a>

                            <p>
                                Public advice is the perfect blend between twitter and ask.fm, where based on the tags
                                you’re subscribed to, you will see people’s posts about their issues, rants, or vents
                                concerning topics you are tagged to. You can comment on posts, and like or dislike
                                comments and posts. If it wasn’t obvious enough through the feature’s name this section
                                of the website is public to anyone on the Internet that wants to open the website.
                                Hence, people may be shy or scared to use it. So we have put the anonymous feature to
                                help avoid any negative feels and give the poster a feeling of digital safety from
                                criticism and judgment.
                            </p>
                        </div>

                        <div id="feedback">
                            <a style="text-decoration: none" href="{{ url('feedback') }}"><h2>Feedback</h2></a>

                            <p>
                                This website was made with the intention to help. What better way to do that than with
                                your help and suggestions? If you have any inquiries, ideas, features you would like to
                                be added, objections, reporting a certain admin, or just letting us know how you enjoyed
                                our services please send it in through the feedback page.
                            </p>
                        </div>

                        <hr style="height:1px;border:none;color:#333;background-color:#333;"/>

                        <div id="whoweare">
                            <h1>Who We Are</h1>

                            <p>
                                You know that one friend you always go to for advice, no matter what the subject? We’re
                                that friend. Better yet, we are a group of friends who, given our variety of ages and
                                experiences, have found ourselves specialized, more or less, on certain topics. Instead
                                of going to one friend who knows a little about one topic of interest, you can go to
                                several, each of which know a lot about one thing. We are well-read, experienced
                                individuals who can offer you advice on various topics ranging from relationships to
                                sports and health, from sex to sexuality and sexual orientation, family feuds and issues
                                to religion and philosophy.
                                If a certain confession or issue arises and we are not specialized to give advice on
                                that specific topic, we seek help from outer, verified sources and state where we got
                                our information from, and why we deem it appropriate.
                                In addition to that, we also offer the service of you posting directly on the website,
                                whether anonymously or not, for the public to give you their opinion. 
                            </p>

                        </div>

                        <div id="name">
                            <h1>The story behind the name</h1>

                            <p>
                                We chose the name <strong>‘My Tunnel Vision’ </strong> because it symbolizes what we are
                                trying to emit
                                using the website. When you’re facing things alone, most of the time you are only able
                                to see your situation through one persective; through a tunnel vision.

                                What we want to accomplish is that through the services we supply on our website, we
                                want to shed some extra light on your tunnel vision, enabling you to see aspects of your
                                problems and concerns from a more objective stand point.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("title")
    About MyTunnelVision
@endsection