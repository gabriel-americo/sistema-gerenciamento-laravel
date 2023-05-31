<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
	data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
	data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
	<div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
		<a href="{{ route('dashboard') }}">
			<img alt="Logo" src="{{ asset('/assets/media/logos/default-dark.svg') }}" class="h-25px app-sidebar-logo-default" />
			<img alt="Logo" src="{{ asset('/assets/media/logos/default-small.svg') }}" class="h-20px app-sidebar-logo-minimize" />
		</a>

		<div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
			data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
			<span class="svg-icon svg-icon-2 rotate-180">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none"	xmlns="http://www.w3.org/2000/svg">
					<path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
					<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
				</svg>
			</span>
		</div>
	</div>

	<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
		<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
			<div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
				<div class="menu-item {{ Request::is('usuarios*') ? 'here show' : '' }}">
					<a class="menu-link" href="{{ route('usuarios.index') }}">
						<span class="menu-icon">
							<span class="svg-icon svg-icon-2">
								<span class="svg-icon svg-icon-2">
									<i class="fa fa-user"></i>
								</span>
							</span>
						</span>
						<span class="menu-title">Usuarios</span>
					</a>
				</div>
				
				<div data-kt-menu-trigger="click" class="menu-item {{ Request::is('clientes*') ? 'here show' : '' }} menu-accordion">
					<span class="menu-link">
						<span class="menu-icon">
							<span class="svg-icon svg-icon-2">
								<span class="svg-icon svg-icon-2">
									<i class="fa fa-users"></i>
								</span>
							</span>
						</span>
						<span class="menu-title">Clientes</span>
						<span class="menu-arrow"></span>
					</span>

					<div class="menu-sub menu-sub-accordion">
						<div class="menu-item">
							<a class="menu-link {{ Request::is('clientes') ? 'active' : '' }}" href="{{ route('clientes.index') }}">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Todos Clientes</span>
							</a>
						</div>

						<div class="menu-item">
							<a class="menu-link {{ Request::is('clientes/create') ? 'active' : '' }}" href="{{ route('clientes.create') }}">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Adicionar Novo</span>
							</a>
						</div>
					</div>
				</div>

				<div class="menu-item pt-5">
					<div class="menu-content">
						<span class="menu-heading fw-bold text-uppercase fs-7">Desenhos</span>
					</div>
				</div>

				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon">
							<span class="svg-icon svg-icon-2">
								<span class="svg-icon svg-icon-2">
									<i class="fa fa-lightbulb"></i>
								</span>
							</span>
						</span>
						<span class="menu-title">Ideias / Briefing</span>
						<span class="menu-arrow"></span>
					</span>

					<div class="menu-sub menu-sub-accordion">
						<div class="menu-item">
							<a class="menu-link" href="#">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Todas Ideias</span>
							</a>
						</div>

						<div class="menu-item">
							<a class="menu-link" href="#">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Adicionar Nova</span>
							</a>
						</div>
					</div>
				</div>

				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon">
							<span class="svg-icon svg-icon-2">
								<span class="svg-icon svg-icon-2">
									<i class="fa fa-edit"></i>
								</span>
							</span>
						</span>
						<span class="menu-title">Aprovações</span>
						<span class="menu-arrow"></span>
					</span>

					<div class="menu-sub menu-sub-accordion">
						<div class="menu-item">
							<a class="menu-link" href="#">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Todas Aprovações</span>
							</a>
						</div>

						<div class="menu-item">
							<a class="menu-link" href="#">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Adicionar Nova</span>
							</a>
						</div>
					</div>
				</div>

				<div class="menu-item pt-5">
					<div class="menu-content">
						<span class="menu-heading fw-bold text-uppercase fs-7">Financeiro</span>
					</div>
				</div>

				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon">
							<span class="svg-icon svg-icon-2">
								<i class="fas fa-briefcase"></i>
							</span>
						</span>
						<span class="menu-title">Fornecedores</span>
						<span class="menu-arrow"></span>
					</span>

					<div class="menu-sub menu-sub-accordion">
						<div class="menu-item">
							<a class="menu-link" href="#">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Todas Aprovações</span>
							</a>
						</div>

						<div class="menu-item">
							<a class="menu-link" href="#">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Adicionar Nova</span>
							</a>
						</div>
					</div>
				</div>

				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon">
							<span class="svg-icon svg-icon-2">
								<i class="fas fa-briefcase"></i>
							</span>
						</span>
						<span class="menu-title">Investimentos</span>
						<span class="menu-arrow"></span>
					</span>

					<div class="menu-sub menu-sub-accordion">
						<div class="menu-item">
							<a class="menu-link" href="#">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Categoria Investimentos</span>
							</a>
						</div>

						<div class="menu-item">
							<a class="menu-link" href="#">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Todos Investimentos</span>
							</a>
						</div>

						<div class="menu-item">
							<a class="menu-link" href="#">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Adicionar Novo</span>
							</a>
						</div>
					</div>
				</div>

				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon">
							<span class="svg-icon svg-icon-2">
								<i class="fa fa-shopping-cart"></i>
							</span>
						</span>
						<span class="menu-title">Produtos</span>
						<span class="menu-arrow"></span>
					</span>

					<div class="menu-sub menu-sub-accordion">
						<div data-kt-menu-trigger="click" class="menu-item menu-accordion">

							<span class="menu-link">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Atributos</span>
								<span class="menu-arrow"></span>
							</span>

							<div class="menu-sub menu-sub-accordion">
								<div class="menu-item">
									<a class="menu-link" href="#">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Tamanhos</span>
									</a>
								</div>

								<div class="menu-item">
									<a class="menu-link" href="#">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Tipos dos produtos</span>
									</a>
								</div>

								<div class="menu-item">
									<a class="menu-link" href="#">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Cores das camisetas</span>
									</a>
								</div>

								<div class="menu-item">
									<a class="menu-link"
										href=".#">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Cores das estampas</span>
									</a>
								</div>
							</div>

							<div class="menu-item">
								<a class="menu-link" href="#">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Todos Produtos</span>
								</a>
							</div>
							<div class="menu-item">
								<a class="menu-link" href="#">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Adicionar Novo</span>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon">
							<span class="svg-icon svg-icon-2">
								<i class="fa fa-shopping-cart"></i>
							</span>
						</span>
						<span class="menu-title">Produtos Wocommerce</span>
						<span class="menu-arrow"></span>
					</span>

					<div class="menu-sub menu-sub-accordion">
						<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
							<div class="menu-item">
								<a class="menu-link" href="#">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Todos Produtos</span>
								</a>
							</div>
							<div class="menu-item">
								<a class="menu-link" href="#">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Adicionar Novo</span>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon">
							<span class="svg-icon svg-icon-2">
								<i class="fa fa-dollar-sign"></i>
							</span>
						</span>
						<span class="menu-title">Vendas</span>
						<span class="menu-arrow"></span>
					</span>

					<div class="menu-sub menu-sub-accordion menu-active-bg">
						<div class="menu-item">
							<a class="menu-link" href="#">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Todas Vendas</span>
							</a>
						</div>

						<div class="menu-item">
							<a class="menu-link" href="#">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Adicionar Nova</span>
							</a>
						</div>
					</div>
				</div>

				<div class="menu-item pt-5">
					<div class="menu-content">
						<span class="menu-heading fw-bold text-uppercase fs-7">Pedidos</span>
					</div>
				</div>

				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon">
							<span class="svg-icon svg-icon-2">
								<i class="fas fa-briefcase"></i>
							</span>
						</span>
						<span class="menu-title">Pedidos</span>
						<span class="menu-arrow"></span>
					</span>

					<div class="menu-sub menu-sub-accordion menu-active-bg">
						<div class="menu-item">
							<a class="menu-link" href="#">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Todos Pedidos</span>
							</a>
						</div>

						<div class="menu-item">
							<a class="menu-link" href="#">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Adicionar Novo</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
