
<?php
session_start();
if (!isset($_SESSION['angemeldet' . $_COOKIE['user']]) || $_SESSION['angemeldet' . $_COOKIE['user']] != true) {
    header('Location: /index.php');
}
 session_start();
 if(isset($_POST['command'])){
     $server = fsockopen("tcp://127.0.0.1", "7777");
    Connect("127.0.0.1", 7777, "12", 3);
    writeData($_POST['command']);
      file_put_contents("test.txt", "Can't open socket.");
 }
 file_put_contents("test.txt", "what.");
        // Sending
        const SERVERDATA_EXECCOMMAND    = 2;
        const SERVERDATA_AUTH           = 3;
       
        // Receiving
        const SERVERDATA_RESPONSE_VALUE = 0;
        const SERVERDATA_AUTH_RESPONSE  = 2;
       
         $Socket;
         $RequestId;
         
 
 function Connect( $Ip, $Port = 7777, $Password, $Timeout = 3 )
        {
                $this->RequestId = 0;
               
                if( $this->Socket = FSockOpen( $Ip, (int)$Port ) )
                {
                        Socket_Set_TimeOut( $this->Socket, $Timeout );
                       
                        if( !$this->Auth( $Password ) )
                        {
                                $this->Disconnect( );
                                
                                throw new Exception( "Authorization failed." );
                                file_put_contents("exception", "auth failed");
                        }
                }
                else
                {
                        throw new Exception( "Can't open socket." );
                        file_put_contents("exception", "Can't open socket.");
                }
        }
 
 
 function writeData( $Command, $String = "" ){
        // Pack the packet together
                $Data = Pack( 'VV', $this->RequestId++, $Command ) . $String . "\x00\x00\x00";
               
                // Prepend packet length
                $Data = Pack( 'V', StrLen( $Data ) ) . $Data;
               
                $Length = StrLen( $Data );
               
                return $Length === FWrite( $this->Socket, $Data, $Length );
 }

 function Auth( $Password )
        {
                if( !$this->WriteData( self :: SERVERDATA_AUTH, $Password ) )
                {
                        return false;
                }
               
                $Data = $this->ReadData( );
               
                return $Data[ 'RequestId' ] > -1 && $Data[ 'Response' ] == self :: SERVERDATA_AUTH_RESPONSE;
        }

  function Command( $String )
        {
                if( !$this->WriteData( self :: SERVERDATA_EXECCOMMAND, $String ) )
                {
                        return false;
                }
               
                $Data = $this->ReadData( );
               
                if( $Data[ 'RequestId' ] < 1 || $Data[ 'Response' ] != self :: SERVERDATA_RESPONSE_VALUE )
                {
                        return false;
                }
               
                return $Data[ 'String' ];
        }
        
  function ReadData( )
        {
                $Packet = Array( );
               
                $Size = FRead( $this->Socket, 4 );
                $Size = UnPack( 'V1Size', $Size );
                $Size = $Size[ 'Size' ];
               
                // TODO: Add multiple packets (Source)
               
                $Packet = FRead( $this->Socket, $Size );
                $Packet = UnPack( 'V1RequestId/V1Response/a*String/a*String2', $Packet );
               
                return $Packet;
        }
        
 function Disconnect( )
        {
                if( $this->Socket )
                {
                        FClose( $this->Socket );
                       
                        $this->Socket = null;
                }
        }
     ?>