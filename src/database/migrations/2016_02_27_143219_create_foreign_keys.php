<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('profiles', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('documents', function(Blueprint $table) {
			$table->foreign('document_type_id')->references('id')->on('document_types')
						->onDelete('restrict')
						->onUpdate('no action');
		});
		Schema::table('documents', function(Blueprint $table) {
			$table->foreign('template_id')->references('id')->on('templates')
						->onDelete('restrict')
						->onUpdate('no action');
		});
		Schema::table('documents', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('documents', function(Blueprint $table) {
			$table->foreign('parent_id')->references('id')->on('documents')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('document_types', function(Blueprint $table) {
			$table->foreign('parent_id')->references('id')->on('document_types')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('properties', function(Blueprint $table) {
			$table->foreign('document_type_id')->references('id')->on('document_types')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('properties', function(Blueprint $table) {
			$table->foreign('data_type_id')->references('id')->on('data_types')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('properties', function(Blueprint $table) {
			$table->foreign('tab_id')->references('id')->on('tabs')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('tabs', function(Blueprint $table) {
			$table->foreign('document_type_id')->references('id')->on('document_types')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('property_values', function(Blueprint $table) {
			$table->foreign('document_id')->references('id')->on('documents')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('property_values', function(Blueprint $table) {
			$table->foreign('property_id')->references('id')->on('properties')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('allowed_types', function(Blueprint $table) {
			$table->foreign('type_id')->references('id')->on('document_types')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('allowed_types', function(Blueprint $table) {
			$table->foreign('allowed_type_id')->references('id')->on('document_types')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('menu_items', function(Blueprint $table) {
			$table->foreign('document_id')->references('id')->on('documents')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('menu_items', function(Blueprint $table) {
			$table->foreign('menu_id')->references('id')->on('menus')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('menu_items', function(Blueprint $table) {
			$table->foreign('parent_id')->references('id')->on('menu_items')
						->onDelete('set null')
						->onUpdate('no action');
		});
		Schema::table('allowed_templates', function(Blueprint $table) {
			$table->foreign('template_id')->references('id')->on('templates')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('allowed_templates', function(Blueprint $table) {
			$table->foreign('document_type_id')->references('id')->on('document_types')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('document_settings', function(Blueprint $table) {
			$table->foreign('document_id')->references('id')->on('documents')
						->onDelete('cascade')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::table('profiles', function(Blueprint $table) {
			$table->dropForeign('profiles_user_id_foreign');
		});
		Schema::table('documents', function(Blueprint $table) {
			$table->dropForeign('documents_document_type_id_foreign');
		});
		Schema::table('documents', function(Blueprint $table) {
			$table->dropForeign('documents_template_id_foreign');
		});
		Schema::table('documents', function(Blueprint $table) {
			$table->dropForeign('documents_user_id_foreign');
		});
		Schema::table('documents', function(Blueprint $table) {
			$table->dropForeign('documents_parent_id_foreign');
		});
		Schema::table('document_types', function(Blueprint $table) {
			$table->dropForeign('document_types_parent_id_foreign');
		});
		Schema::table('properties', function(Blueprint $table) {
			$table->dropForeign('properties_document_type_id_foreign');
		});
		Schema::table('properties', function(Blueprint $table) {
			$table->dropForeign('properties_data_type_id_foreign');
		});
		Schema::table('properties', function(Blueprint $table) {
			$table->dropForeign('properties_tab_id_foreign');
		});
		Schema::table('tabs', function(Blueprint $table) {
			$table->dropForeign('tabs_document_type_id_foreign');
		});
		Schema::table('property_values', function(Blueprint $table) {
			$table->dropForeign('property_values_document_id_foreign');
		});
		Schema::table('property_values', function(Blueprint $table) {
			$table->dropForeign('property_values_property_id_foreign');
		});
		Schema::table('allowed_types', function(Blueprint $table) {
			$table->dropForeign('allowed_types_type_id_foreign');
		});
		Schema::table('allowed_types', function(Blueprint $table) {
			$table->dropForeign('allowed_types_allowed_type_id_foreign');
		});
		Schema::table('menu_items', function(Blueprint $table) {
			$table->dropForeign('menu_items_document_id_foreign');
		});
		Schema::table('menu_items', function(Blueprint $table) {
			$table->dropForeign('menu_items_menu_id_foreign');
		});
		Schema::table('menu_items', function(Blueprint $table) {
			$table->dropForeign('menu_items_parent_id_foreign');
		});
		Schema::table('allowed_templates', function(Blueprint $table) {
			$table->dropForeign('allowed_templates_template_id_foreign');
		});
		Schema::table('allowed_templates', function(Blueprint $table) {
			$table->dropForeign('allowed_templates_document_type_id_foreign');
		});
		Schema::table('document_settings', function(Blueprint $table) {
			$table->dropForeign('document_settings_document_id_foreign');
		});
	}
}