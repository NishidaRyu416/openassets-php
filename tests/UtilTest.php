<?php
namespace OKohei\OpenAssets\Tests;

use OKohei\OpenAssets\Util;
use OKohei\OpenAssets\Protocols\ColoringEngine;
use BitWasp\Bitcoin\Bitcoin;
use BitWasp\Bitcoin\Network\NetworkFactory;
use BitWasp\Bitcoin\Address\AddressFactory;

class UtilTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        $testnet = NetworkFactory::bitcoinTestnet();
        Bitcoin::setNetwork($testnet);
    }

    public function testToOaAddress()
    {
        $oaAddress =  Util::toOaAddress('1F2AQr6oqNtcJQ6p9SiCLQTrHuM9en44H8');
        $this->assertEquals($oaAddress, 'akQz3f1v9JrnJAeGBC4pNzGNRdWXKan4U6E');
    }
    
    public function testOaAddressToBtcAddress()
    {
        $oaAddress =  Util::OaAddressToBtcAddress('akQz3f1v9JrnJAeGBC4pNzGNRdWXKan4U6E');
        $this->assertEquals($oaAddress, '1F2AQr6oqNtcJQ6p9SiCLQTrHuM9en44H8');
    }
    
    public function testPubkeyHashToAssetId()
    {
        $assetId =  Util::pubkeyHashToAssetId('081522820f2ccef873e47ee62b31cb9e9267e725');
        $this->assertEquals($assetId, 'oWLkUn44E45cnQtsP6x1wrvJ2iRx9XyFny');
    }
    
    public function testGenerateAssetId()
    {
        $mainnet = NetworkFactory::bitcoin();
        Bitcoin::setNetwork($mainnet);
        $assetId =  Util::generateAssetId('0450863ad64a87ae8a2fe83c1af1a8403cb53f53e486d8511dad8a04887e5b23522cd470243453a299fa9e77237716103abc11a1df38855ed6f2ee187e9c582ba6');
        $this->assertEquals($assetId, 'ALn3aK1fSuG27N96UGYB1kUYUpGKRhBuBC');
    }
    
    public function testEncodeLeb128()
    {
        $leb128 = Util::encodeLeb128(300);
        $this->assertEquals($leb128[1], 'ac02');
        $leb128 = Util::encodeLeb128(300);
    }
    
    public function testDecodeLeb128()
    {
        //$res = Util::decodeLeb128('e58e26');
        //$this->assertEquals(624485, $res[0]);
        //$res = Util::decodeLeb128('904e904e');
        //$this->assertEquals(2, count($res));
        //$this->assertEquals(10000, $res[0]);
        //$this->assertEquals(10000, $res[1]);
    }

    public function testOaAddressToAssetId()
    {
    }

    public function testReadVarInteger()
    {
    }
}
