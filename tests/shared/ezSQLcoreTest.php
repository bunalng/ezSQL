<?php

require_once 'shared/ez_sql_core.php';

require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;

/**
 * Test class for ezSQLcore.
 * Generated by PHPUnit
 *
 * @author  Stefanie Janine Stoelting <mail@stefanie-stoelting.de>
 * @name    ezSQLcoreTest
 * @package ezSQL
 * @subpackage unitTests
 * @license FREE / Donation (LGPL - You may do what you like with ezSQL - no exceptions.)
 */
class ezSQLcoreTest extends TestCase {

    /**
     * @var ezSQLcore
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new ezSQLcore;
    } // setUp

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        $this->object = null;
    } // tearDown

    /**
     * @covers ezSQLcore::register_error
     */
    public function testRegister_error() {
        $err_str = 'Test error string';
        
        $this->object->register_error($err_str);
        
        $this->assertEquals($err_str, $this->object->last_error);
    } // testRegister_error

    /**
     * @covers ezSQLcore::show_errors
     */
    public function testShow_errors() {
        $this->object->hide_errors();
        
        $this->assertFalse($this->object->getShowErrors());
        
        $this->object->show_errors();
        
        $this->assertTrue($this->object->getShowErrors());
    } // testShow_errors

    /**
     * @covers ezSQLcore::hide_errors
     */
    public function testHide_errors() {
        $this->object->hide_errors();
        
        $this->assertFalse($this->object->getShowErrors());
    } // testHide_errors

    /**
     * @covers ezSQLcore::flush
     */
    public function testFlush() {
        $this->object->flush();
        
        $this->assertNull($this->object->last_result);
        $this->assertNull($this->object->col_info);
        $this->assertNull($this->object->last_query);
        $this->assertFalse($this->object->from_disk_cache);
    } // testFlush

    /**
     * @covers ezSQLcore::get_var
     */
    public function testGet_var() {
        $this->assertNull($this->object->get_var());
    } // testGet_var

    /**
     * @covers ezSQLcore::get_row
     */
    public function testGet_row() {
        $this->assertNull($this->object->get_row());
    } // testGet_row

    /**
     * @covers ezSQLcore::get_col
     */
    public function testGet_col() {
        $this->assertEmpty($this->object->get_col());
    } // testGet_col

    /**
     * @covers ezSQLcore::get_results
     */
    public function testGet_results() {
        $this->assertNull($this->object->get_results());
    } // testGet_results

    /**
     * @covers ezSQLcore::get_col_info
     */
    public function testGet_col_info() {
        $this->assertEmpty($this->object->get_col_info());
    } // testGet_col_info

    /**
     * @covers ezSQLcore::store_cache
     */
    public function testStore_cache() {
        $sql = 'SELECT * FROM ez_test';
        
        $this->object->store_cache($sql, true);
        
        $this->assertNull($this->object->get_cache($sql));
    } // testStore_cache

    /**
     * @covers ezSQLcore::get_cache
     */
    public function testGet_cache() {
        $sql = 'SELECT * FROM ez_test';
        
        $this->object->store_cache($sql, true);
        
        $this->assertNull($this->object->get_cache($sql));
    } // testGet_cache

    /**
     * The test echos HTML, it is just a test, that is still running
     * @covers ezSQLcore::vardump
     */
    public function testVardump() {
        $this->object->vardump();
    } // testVardump

    /**
     * The test echos HTML, it is just a test, that is still running
     * @covers ezSQLcore::dumpvar
     */
    public function testDumpvar() {
        $this->object->dumpvar('');
    } // testDumpvar

    /**
     * @covers ezSQLcore::debug
     */
    public function testDebug() {
        $this->assertNotEmpty($this->object->debug(false));
        
        // In addition of getting a result, it fills the console
        $this->assertNotEmpty($this->object->debug(true));
    } // testDebug

    /**
     * @covers ezSQLcore::donation
     */
    public function testDonation() {
        $this->assertNotEmpty($this->object->donation());
    } // testDonation

    /**
     * @covers ezSQLcore::timer_get_cur
     */
    public function testTimer_get_cur() {
        list($usec, $sec) = explode(' ',microtime());
        
        $expected = ((float)$usec + (float)$sec);
        
        $this->assertGreaterThanOrEqual($expected, $this->object->timer_get_cur());
    } // testTimer_get_cur

    /**
     * @covers ezSQLcore::timer_start
     */
    public function testTimer_start() {
        $this->object->timer_start('test_timer');
    } // testTimer_start

    /**
     * @covers ezSQLcore::timer_elapsed
     */
    public function testTimer_elapsed() {
        $expected = 0;
        
        $this->object->timer_start('test_timer');
        
        $this->assertGreaterThanOrEqual($expected, $this->object->timer_elapsed('test_timer'));
    } // testTimer_elapsed

    /**
     * @covers ezSQLcore::timer_update_global
     */
    public function testTimer_update_global() {
        $this->object->timer_start('test_timer');
        $this->object->timer_update_global('test_timer');
    }

    /**
     * @covers ezSQLcore::affectedRows
     */
    public function testAffectedRows() {
        $this->assertEquals(0, $this->object->affectedRows());
    } // testAffectedRows

} //
