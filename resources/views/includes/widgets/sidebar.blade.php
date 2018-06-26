				<aside id="sidebar-left" class="sidebar-left">
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li class="">
										<a href="{{ url('/') }}">
											<i class="fa fa-dashboard" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<li class="nav-parent nav-active">
										<a>
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Manage Students</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="{{ route('students.create') }}">
													Current Students
												</a>
											</li>
											<li>
												<a href="{{ route('students.index') }}">
													All Students
												</a>
											</li>
										</ul>
									</li>
									
									<li class="nav-parent">
										<a>
											<i class="fa fa-paper-plane" aria-hidden="true"></i>
											<span>Manage Promotions</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="{{ route('promotions.get') }}">
													Promotions
												</a>
											</li>
										</ul>
									</li>

									<li class="nav-parent">
										<a>
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>Manage Guardians</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="{{ route('guardians.index') }}">
													Manage Guardian
												</a>
											</li>
										</ul>
									</li>

									<li class="nav-parent">
										<a>
											<i class="fa fa-signal" aria-hidden="true"></i>
											<span>Manage Classes</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="{{ route('levels.index') }}">
													Manage Classes
												</a>
											</li>
										</ul>
									</li>

									<li class="nav-parent">
										<a>
											<i class="fa fa-calendar-o" aria-hidden="true"></i>
											<span>Manage Sessions</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="{{ route('yeargroups.index') }}">
													Manage Sessions
												</a>
											</li>
										</ul>
									</li>

									<li class="nav-parent">
										<a>
											<i class="fa fa-calendar-o" aria-hidden="true"></i>
											<span>Manage Subjects</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="{{ route('subjects.index') }}">
													Subjects
												</a>
											</li>
										</ul>
									</li>

									<li class="nav-parent">
										<a>
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Manage Teachers</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="{{ route('teachers.index') }}">
													Teachers
												</a>
											</li>

											<li>
												<a href="{{ route('subjectTeachers.index') }}">
													Subject Teachers
												</a>
											</li>

											<li>
												<a href="{{ route('formTeachers.index') }}">
													Form Masters
												</a>
											</li>
										</ul>
									</li>

									<li class="nav-parent">
										<a>
											<i class="fa fa-dollar" aria-hidden="true"></i>
											<span>Manage Finance</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="{{ route('feetypes.index') }}">
													Create Fees
												</a>
											</li>
											<li>
												<a href="{{ route('payments.index') }}">
													Pay Student Fees
												</a>
											</li>
											<li>
												<a href="{{ route('payments.create') }}">
													Students Payments
												</a>
											</li>
											<li>
												<a href="">
													Pay Salary
												</a>
											</li>
											<li>
												<a href="">
													Other Expenses
												</a>
											</li>
										</ul>
									</li>
									
									<li class="nav-parent">
										<a>
											<i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>
											<span>Manage Exams</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="{{ route('results.index') }}">
													Upload Scores
												</a>
											</li>
											<li>
												<a href="{{ route('results.create') }}">
													View Uploaded Scores
												</a>
											</li>
										</ul>
									</li>

									<li class="nav-parent">
										<a>
											<i class="fa fa-drivers-license" aria-hidden="true"></i>
											<span>Manage Results</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="{{ route('termResults.index') }}">
													Generate Results
												</a>
											</li>
											<li>
												<a href="{{ route('termResults.create') }}">
													Generate Report Cards
												</a>
											</li>
										</ul>
									</li>

								</ul>
							</nav>
						</div>
				
					</div>
				</aside>