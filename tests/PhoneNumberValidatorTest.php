<?php

    namespace OmodingMike\PhoneNumberValidator\Tests;

    use OmodingMike\PhoneNumberValidator\Constants\PhoneNumberFormat;
    use OmodingMike\PhoneNumberValidator\Exceptions\InvalidPhoneNumberException;
    use OmodingMike\PhoneNumberValidator\PhoneNumberValidator;

    class PhoneNumberValidatorTest extends TestCase
    {
        /** @test */
        public function it_accepts_valid_phone_numbers()
        {
            $this->assertTrue( PhoneNumberValidator::isValid( '0702345672' ) );
            $this->assertTrue( PhoneNumberValidator::isValid( '256702345672' ) );
            $this->assertTrue( PhoneNumberValidator::isValid( '+256702345672' ) );
        }

        /** @test */
        public function it_rejects_invalid_phone_numbers()
        {
            $this->assertFalse( PhoneNumberValidator::isValid( '12345' ) );
            $this->assertFalse( PhoneNumberValidator::isValid( '+255702345672' ) ); // wrong country code
            $this->assertFalse( PhoneNumberValidator::isValid( '0802345672' ) );    // invalid prefix
        }

        /** @test */
        public function it_throws_exception_for_invalid_numbers_on_formatting()
        {
            $this->expectException( InvalidPhoneNumberException::class );

            PhoneNumberValidator::format( '12345' );
        }

        /** @test */
        public function it_formats_number_in_e164()
        {
            $this->assertEquals(
                '+256702345672' ,
                PhoneNumberValidator::format( '0702345672' , PhoneNumberFormat::E164 )
            );
        }

        /** @test */
        public function it_formats_number_in_international_style()
        {
            $this->assertEquals(
                '+256 702 345 672' ,
                PhoneNumberValidator::format( '0702345672' , PhoneNumberFormat::INTERNATIONAL )
            );
        }

        /** @test */
        public function it_formats_number_in_national_style()
        {
            $this->assertEquals(
                '0702 345 672' ,
                PhoneNumberValidator::format( '0702345672' , PhoneNumberFormat::NATIONAL )
            );
        }

        /** @test */
        public function it_formats_number_in_local_style()
        {
            $this->assertEquals(
                '0702345672' ,
                PhoneNumberValidator::format( '0702345672' , PhoneNumberFormat::LOCAL )
            );
        }

        /** @test */
        public function it_formats_number_in_parens_dash_style()
        {
            $this->assertEquals(
                '(702) 345-672' ,
                PhoneNumberValidator::format( '0702345672' , PhoneNumberFormat::PARENS_DASH )
            );
        }

        /** @test */
        public function it_formats_number_in_intl_dashed_style()
        {
            $this->assertEquals(
                '+256 702-345-672' ,
                PhoneNumberValidator::format( '0702345672' , PhoneNumberFormat::INTL_DASHED )
            );
        }
    }
