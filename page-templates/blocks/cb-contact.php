<?php
/**
 * Block template for CB Contact.
 *
 * @package cb-pbh2025
 */

$classes = '';

if ( is_single()) {
	$classes = 'contact--alt';
}

?>
<a class="contact <?= esc_attr( $classes ); ?>" href="/contact/">
	<div class="absolute inset-0 flex flex-auto items-center justify-center w-full z-10">
		<div class="contact__not-hover">
			<span>Get in touch</span>
			<div class="contact__icon">
				<svg aria-hidden="true" class="fill-current h-full w-full" focusable="false" height="28" viewBox="0 0 100 100" width="28" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
					<path d="M50.66 49.45 62.01 0 30.37 50.55h18.78L37.8 100l27.8-44.42 4.03-6.14H50.66Zm8.91-43.56-10 43.56h-.18l-17.12.04 27.3-43.6ZM40.32 93.76l9.92-43.21h17.27l-.78 1.25-26.4 41.96Z"></path>
				</svg>
			</div>
		</div>
		<div class="contact__hover">
			<div class="marquee enable-animation">
				<div class="marquee__content flex-shrink-0">
					<div class="marquee__item pt-8 lg:pt-16">
						<span class="text-[200px] px-16 font-extrabold uppercase italic leading-none tracking-tight lg:text-[320px] text-fill-transparent text-stroke-6 text-stroke-pbh-blue-500">Get in touch</span>
					</div>
				</div>
				<div class="marquee__content flex-shrink-0" aria-hidden="true">
					<div class="marquee__item pt-8 lg:pt-16">
						<span class="text-[200px] px-16 font-extrabold uppercase italic leading-none tracking-tight lg:text-[320px] text-fill-transparent text-stroke-6 text-stroke-pbh-blue-500">Get in touch</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</a>