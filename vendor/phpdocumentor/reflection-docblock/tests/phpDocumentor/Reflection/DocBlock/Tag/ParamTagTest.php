<?php
/**
 * phpDocumentor Param tag test.
 */

namespace phpDocumentor\Reflection\DocBlock\Tag;

/**
 * Test class for \phpDocumentor\Reflection\DocBlock\ParamTag
 */
class ParamTagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test that the \phpDocumentor\Reflection\DocBlock\Tag\ParamTag can
     * understand the @param DocBlock.
     */
    public function testConstructorParsesInputsIntoCorrectFields(
        $type,
        $content,
        $extractedType,
        $extractedTypes,
        $extractedVarName,
        $extractedDescription
    ) {
        $tag = new ParamTag($type, $content);

        $this->assertEquals($type, $tag->getName());
        $this->assertEquals($extractedType, $tag->getType());
        $this->assertEquals($extractedTypes, $tag->getTypes());
        $this->assertEquals($extractedVarName, $tag->getVariableName());
        $this->assertEquals($extractedDescription, $tag->getDescription());
    }

    /**
     * Data provider for testConstructorParsesInputsIntoCorrectFields()
     *
     * @return array
     */
    public function provideDataForConstructor()
    {
        return array(
            array('param', 'int', 'int', array('int'), '', ''),
            array('param', '$bob', '', array(), '$bob', ''),
            array(
                'param',
                'int Number of bobs',
                'int',
                array('int'),
                '',
                'Number of bobs'
            ),
            array(
                'param',
                'int $bob',
                'int',
                array('int'),
                '$bob',
                ''
            ),
            array(
                'param',
                'int $bob Number of bobs',
                'int',
                array('int'),
                '$bob',
                'Number of bobs'
            ),
            array(
                'param',
                "int Description \n on multiple lines",
                'int',
                array('int'),
                '',
                "Description \n on multiple lines"
            ),
            array(
                'param',
                "int \n\$bob Variable name on a new line",
                'int',
                array('int'),
                '$bob',
                "Variable name on a new line"
            ),
            array(
                'param',
                "\nint \$bob Type on a new line",
                'int',
                array('int'),
                '$bob',
                "Type on a new line"
            )
        );
    }
}
