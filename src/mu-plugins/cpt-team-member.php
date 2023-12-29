<?php
/**
 * CPT Team Member registration.
 *
 * @package mogo
 */

add_action(
	'init',
	function () {
		register_post_type(
			'team-member',
			array(
				'labels'           => array(
					'name'                     => 'Team members',
					'singular_name'            => 'Team member',
					'menu_name'                => 'Teams',
					'all_items'                => 'All Teams',
					'edit_item'                => 'Edit Team member',
					'view_item'                => 'View Team member',
					'view_items'               => 'View Teams',
					'add_new_item'             => 'Add New Team member',
					'add_new'                  => 'Add New Team member',
					'new_item'                 => 'New Team member',
					'parent_item_colon'        => 'Parent Team member:',
					'search_items'             => 'Search Teams',
					'not_found'                => 'No teams found',
					'not_found_in_trash'       => 'No teams found in Trash',
					'archives'                 => 'Team member Archives',
					'attributes'               => 'Team member Attributes',
					'insert_into_item'         => 'Insert into team member',
					'uploaded_to_this_item'    => 'Uploaded to this team member',
					'filter_items_list'        => 'Filter teams list',
					'filter_by_date'           => 'Filter teams by date',
					'items_list_navigation'    => 'Teams list navigation',
					'items_list'               => 'Teams list',
					'item_published'           => 'Team member published.',
					'item_published_privately' => 'Team member published privately.',
					'item_reverted_to_draft'   => 'Team member reverted to draft.',
					'item_scheduled'           => 'Team member scheduled.',
					'item_updated'             => 'Team member updated.',
					'item_link'                => 'Team member Link',
					'item_link_description'    => 'A link to a team member.',
				),
				'public'           => true,
				'show_in_rest'     => true,
				'supports'         => array(
					0 => 'title',
					1 => 'thumbnail',
				),
				'delete_with_user' => false,
			)
		);
	}
);
