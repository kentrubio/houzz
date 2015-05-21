@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('content')
    <div class="container">
        <div class="short-header profile-header view">
            <div class="profile-cover">
                <div class="profile-pic-container">
                    <a class="profile-pic-border" href="http://www.houzz.com/pro/wizardoncouch/wizardoncouch">
                        <span class="profile-camera-icon hzi-font hzi-Add_Photo"
                              onclick="HZ.profile.EditPic.showEditPicDialog(); return false;"></span> <img
                                class="profile-pic" width="173" height="173" id="mainUserProfilePic"
                                src="http://st.houzz.com/fimgs/f11344760551ce31_4564-w173-h173-b0-p0--wizardoncouch.jpg"
                                oncontextmenu="return false;" onmousedown="preventImageDrag(event);"
                                ondragstart="return false;" onselectstart="return false;">

                    </a>
                </div>
                <img id="coverImage" class="cover-image custom-cover "
                     src="http://st.houzz.com/simgs/577166a2055144ac_17-0707/home-design.jpg"
                     oncontextmenu="return false;" onmousedown="preventImageDrag(event);" ondragstart="return false;"
                     onselectstart="return false;">

                <div class="profile-info" itemscope="" itemtype="http://schema.org/localbusiness">
                    <div class="profile-title">
                        <a class="profile-full-name" itemprop="name"
                           href="http://www.houzz.com/pro/wizardoncouch/wizardoncouch">WizardOnCouch</a>

                        <div class="profile-pro-reviews">
                            <span class="sprite-profile-icons pi-pro-badge-white"></span>
                            <a class="pro-review-string review-me-link" href="http://www.houzz.com/askForReview">Get
                                Reviews <span class="more-icon"></span></a></div>
                    </div>
                </div>
                <div class="change-cover-photo">
                    <a class="hzBtn" id="changeCoverPhoto"><i class="hzi-font hzi-Add_Photo"></i>Change Cover Photo</a>
                </div>
                <div class="profile-pro-actions">
                    <a class="hzBtn whitebutton profile-action-button"
                       href="https://www.houzz.com/editProfile/userName=wizardoncouch"><i
                                class="hzi-Edit-Fill hzi-font"></i>Edit Profile</a>

                    <div class="profile-view-link">
                        <a class="icon-wrap colorLink small-text"
                           href="http://www.houzz.com/pro/wizardoncouch/__public">Preview your public profile<span
                                    class="pi-arrow-right"></span></a>
                    </div>
                </div>
                <div class="sidebar-group-inline sidebar profile-tabs">
                    <div class="">
                        <ul class="list-inline list-unstyled touch-scroll-list">
                            <li class="">
                                <div class="profile-pic-placeholder"></div>
                            </li>
                            <li class="sidebar-item selected"><a class="sidebar-item-label"
                                                                 href="http://www.houzz.com/pro/wizardoncouch/wizardoncouch"
                                                                 compid="your_houzz_tab"><span class="option-text">Your Houzz</span></a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-item-label"
                                                        href="http://www.houzz.com/projects/users/wizardoncouch"
                                                        compid="projects_tab"><span class="option-text">Projects</span></a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-item-label"
                                                        href="http://www.houzz.com/ideabooks/users/wizardoncouch"
                                                        compid="ideabooks_tab"><span
                                            class="option-text">Ideabooks</span></a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-item-label"
                                                        href="http://www.houzz.com/browseReviews/wizardoncouch"
                                                        compid="reviews_tab"><span
                                            class="option-text">Reviews</span></a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-item-label"
                                                        href="http://www.houzz.com/userQuestions/user/wizardoncouch"
                                                        compid="questions_tab"><span
                                            class="option-text">Questions</span></a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-item-label"
                                                        href="http://www.houzz.com/bookmarks/user/wizardoncouch"
                                                        compid="bookmarks_tab"><span
                                            class="option-text">Bookmarks</span></a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-item-label"
                                                        href="http://www.houzz.com/activities/user/wizardoncouch"
                                                        compid="activity_tab"><span class="option-text">Activity</span></a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-item-label" href="http://www.houzz.com/messages"
                                                        compid="messages_tab"><span class="option-text">Messages</span></a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-item-label"
                                                        href="https://www.houzz.com/browseOrders"
                                                        compid="purchases_tab"><span
                                            class="option-text">Purchases</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer')
    @include('partials.title-only-footer')
@endsection
