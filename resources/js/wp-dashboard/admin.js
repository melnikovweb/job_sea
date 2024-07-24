jQuery(document).ready(() => {
  wp.domReady( () => {
    wp.blocks.registerBlockStyle( 'core/spacer', {
      name: 'default-spacer',
      label: 'Default',
      isDefault: true,
    } );

    wp.blocks.registerBlockStyle( 'core/spacer', {
      name: 'hide-for-mobile',
      label: 'Hide For Mobile',
      isDefault: true,
    } );
  });
});
